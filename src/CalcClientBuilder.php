<?php

namespace CalcLib;

use CalcLib\Http\HttpCallBack;

class CalcClientBuilder
{
    /**
     * @var array List of Default configurations
     */
    private $config = [
        'timeout' => ConfigurationDefaults::TIMEOUT,
        'enableRetries' => ConfigurationDefaults::ENABLE_RETRIES,
        'numberOfRetries' => ConfigurationDefaults::NUMBER_OF_RETRIES,
        'retryInterval' => ConfigurationDefaults::RETRY_INTERVAL,
        'backOffFactor' => ConfigurationDefaults::BACK_OFF_FACTOR,
        'maximumRetryWaitTime' => ConfigurationDefaults::MAXIMUM_RETRY_WAIT_TIME,
        'retryOnTimeout' => ConfigurationDefaults::RETRY_ON_TIMEOUT,
        'httpStatusCodesToRetry' => ConfigurationDefaults::HTTP_STATUS_CODES_TO_RETRY,
        'httpMethodsToRetry' => ConfigurationDefaults::HTTP_METHODS_TO_RETRY,
        'environment' => ConfigurationDefaults::ENVIRONMENT,
        'httpCallback' => null
    ];

    private function clone(array $config): array
    {
        return array_map(
            function ($c) {
                if (is_object($c)) {
                    $c = clone $c;
                }
                return $c;
            },
            $config
        );
    }

    private function __construct(array $config)
    {
        $this->config = array_merge($this->config, $this->clone($config));
    }

    public static function init(array $config = []): self
    {
        return new self($config);
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
        return new CalcClient($this->clone($this->config));
    }
}
