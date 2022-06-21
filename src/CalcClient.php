<?php

declare(strict_types=1);

/*
 * CalcLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace CalcLib;

use CalcLib\Controllers;

/**
 * CalcLib client class
 */
class CalcClient implements ConfigurationInterface
{
    private $simpleCalculator;

    private $configOptions;
    private $authManagers = [];

    /**
     * @param array $config
     * @deprecated Use CalcClientBuilder::init()->build() to set configurations instead
     * @see CalcClientBuilder::init()
     * @see CalcClientBuilder::build()
     */
    public function __construct(array $config = [])
    {
        $this->configOptions = array_merge(ConfigurationDefaults::_ALL, ApiHelper::clone($config));
    }

    /**
     * Create a builder with the current client's configurations.
     *
     * @return CalcClientBuilder
     */
    public function toBuilder(): CalcClientBuilder
    {
        return CalcClientBuilder::init()
            ->timeout($this->getTimeout())
            ->enableRetries($this->shouldEnableRetries())
            ->numberOfRetries($this->getNumberOfRetries())
            ->retryInterval($this->getRetryInterval())
            ->backOffFactor($this->getBackOffFactor())
            ->maximumRetryWaitTime($this->getMaximumRetryWaitTime())
            ->httpStatusCodesToRetry($this->getHttpStatusCodesToRetry())
            ->httpMethodsToRetry($this->getHttpMethodsToRetry())
            ->environment($this->getEnvironment())
            ->httpCallback($this->configOptions['httpCallback']);
    }

    /**
     * Get the client configuration as an associative array
     * @deprecated It will be removed in the next release,
     *             Use toBuilder()->getConfiguration() instead
     * @see CalcClientBuilder::getConfiguration()
     */
    public function getConfiguration(): array
    {
        return $this->toBuilder()->getConfiguration();
    }

    /**
     * Clone this client and override given configuration options
     * @deprecated It will be removed in the next release,
     *             Use toBuilder()->build() to set configurations instead
     * @see CalcClientBuilder::build()
     */
    public function withConfiguration(array $config): self
    {
        $config = array_merge(ConfigurationDefaults::_ALL, $this->configOptions, ApiHelper::clone($config));
        return CalcClientBuilder::init()
            ->timeout($config['timeout'])
            ->enableRetries($config['enableRetries'])
            ->numberOfRetries($config['numberOfRetries'])
            ->retryInterval($config['retryInterval'])
            ->backOffFactor($config['backOffFactor'])
            ->maximumRetryWaitTime($config['maximumRetryWaitTime'])
            ->httpStatusCodesToRetry($config['httpStatusCodesToRetry'])
            ->httpMethodsToRetry($config['httpMethodsToRetry'])
            ->environment($config['environment'])
            ->httpCallback($config['httpCallback'])
            ->build();
    }

    public function getTimeout(): int
    {
        return $this->configOptions['timeout'];
    }

    public function shouldEnableRetries(): bool
    {
        return $this->configOptions['enableRetries'];
    }

    public function getNumberOfRetries(): int
    {
        return $this->configOptions['numberOfRetries'];
    }

    public function getRetryInterval(): float
    {
        return $this->configOptions['retryInterval'];
    }

    public function getBackOffFactor(): float
    {
        return $this->configOptions['backOffFactor'];
    }

    public function getMaximumRetryWaitTime(): int
    {
        return $this->configOptions['maximumRetryWaitTime'];
    }

    public function shouldRetryOnTimeout(): bool
    {
        return $this->configOptions['retryOnTimeout'];
    }

    public function getHttpStatusCodesToRetry(): array
    {
        return $this->configOptions['httpStatusCodesToRetry'];
    }

    public function getHttpMethodsToRetry(): array
    {
        return $this->configOptions['httpMethodsToRetry'];
    }

    public function getEnvironment(): string
    {
        return $this->configOptions['environment'];
    }

    /**
     * Get the base uri for a given server in the current environment
     *
     * @param  string $server Server name
     *
     * @return string         Base URI
     */
    public function getBaseUri(string $server = Server::DEFAULT_): string
    {
        return static::ENVIRONMENT_MAP[$this->getEnvironment()][$server];
    }

    /**
     * Returns Simple Calculator Controller
     */
    public function getSimpleCalculatorController(): Controllers\SimpleCalculatorController
    {
        if ($this->simpleCalculator == null) {
            $this->simpleCalculator = new Controllers\SimpleCalculatorController(
                $this,
                $this->authManagers,
                $this->configOptions['httpCallback']
            );
        }
        return $this->simpleCalculator;
    }

    /**
     * A map of all baseurls used in different environments and servers
     *
     * @var array
     */
    private const ENVIRONMENT_MAP = [
        Environment::PRODUCTION => [
            Server::DEFAULT_ => 'http://examples.apimatic.io/apps/calculator',
        ],
    ];
}
