<?php

declare(strict_types=1);

namespace CalcLib;

use CalcLib\Http\HttpCallBack;

class CalcClientBuilder
{
    private $config = [];

    private function __construct()
    {
    }

    public static function init(): self
    {
        return new self();
    }

    public function withConfig(array $config): self
    {
        $this->config = array_merge($this->config, ApiHelper::clone($config));
        return $this;
    }

    public function getConfiguration(): array
    {
        return ApiHelper::clone($this->config);
    }

    public function timeout(int $timeout): self
    {
        $this->config['timeout'] = $timeout;
        return $this;
    }

    public function enableRetries(bool $enableRetries): self
    {
        $this->config['enableRetries'] = $enableRetries;
        return $this;
    }

    public function numberOfRetries(int $numberOfRetries): self
    {
        $this->config['numberOfRetries'] = $numberOfRetries;
        return $this;
    }

    public function retryInterval(int $retryInterval): self
    {
        $this->config['retryInterval'] = $retryInterval;
        return $this;
    }

    public function backOffFactor(int $backOffFactor): self
    {
        $this->config['backOffFactor'] = $backOffFactor;
        return $this;
    }

    public function maximumRetryWaitTime(int $maximumRetryWaitTime): self
    {
        $this->config['maximumRetryWaitTime'] = $maximumRetryWaitTime;
        return $this;
    }

    public function retryOnTimeout(bool $retryOnTimeout): self
    {
        $this->config['retryOnTimeout'] = $retryOnTimeout;
        return $this;
    }

    /**
     * @param int[] $httpStatusCodesToRetry
     * @return $this
     */
    public function httpStatusCodesToRetry(array $httpStatusCodesToRetry): self
    {
        $this->config['httpStatusCodesToRetry'] = $httpStatusCodesToRetry;
        return $this;
    }

    /**
     * @param string[] $httpMethodsToRetry
     * @return $this
     */
    public function httpMethodsToRetry(array $httpMethodsToRetry): self
    {
        $this->config['httpMethodsToRetry'] = $httpMethodsToRetry;
        return $this;
    }

    public function environment(bool $environment): self
    {
        $this->config['environment'] = $environment;
        return $this;
    }

    public function httpCallback(HttpCallBack $httpCallback): self
    {
        $this->config['httpCallback'] = $httpCallback;
        return $this;
    }

    public function build(): CalcClient
    {
        return new CalcClient($this->config);
    }
}
