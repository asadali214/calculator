<?php

use CalcLib\CalcClient;
use CalcLib\CalcClientBuilder;
use CalcLib\Http\HttpCallBack;

require_once 'vendor/autoload.php';

$client = new CalcClient([
    'timeout' => 4,
    'enableRetries' => "true",         // should be a boolean not string
    'httpCallback' => new stdClass()   // should be HttpCallback
]);
try {
    $client->shouldEnableRetries();
    $client->getSimpleCalculatorController();
} catch (Throwable $e) {
    // showing flaws in previous implementation of client
    // throwing type error at runtime error when httpCallback is set to
    // new stdClass() instead of new HttpCallback(),
    // Proving that we can't fix types of configuration while getting them as an array
    var_dump($e->getMessage());
}

$client = CalcClientBuilder::init()
    ->timeout(3)
    ->httpCallback(new HttpCallBack())
    ->build();
var_dump($client->toBuilder()->getConfiguration());

$builder = $client->toBuilder()
    ->httpCallback(
        new HttpCallBack(
            function (\CalcLib\Http\HttpRequest $request) {
                return 'asad';
            }
        )
    );

$client2 = $builder->build();
$client3 = $builder->enableRetries(true)->build();

var_dump($client2->toBuilder()->getConfiguration());
var_dump($client3->toBuilder()->getConfiguration());
