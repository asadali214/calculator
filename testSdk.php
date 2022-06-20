<?php

use CalcLib\CalcClient;
use CalcLib\CalcClientBuilder;
use CalcLib\Http\HttpCallBack;

require_once 'vendor/autoload.php';

$client = new CalcClient([
    'timeout' => 4
]);

$client = CalcClientBuilder::init()
    ->timeout(3)
    ->httpCallback(new HttpCallBack())
    ->build();
var_dump($client->getTimeout(), $client->getConfiguration()['httpCallback']);

$builder = $client->toBuilder()
    ->timeout(6)
    ->httpCallback(
        new HttpCallBack(
            function () {
                return 'asad';
            }
        )
    );

$newClient = $builder->build();

var_dump($client->getTimeout(), $client->getConfiguration()['httpCallback']);
var_dump($newClient->getTimeout(), $newClient->getConfiguration()['httpCallback']);
