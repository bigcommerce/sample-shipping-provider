<?php

namespace BCSample\Shipping\Domain\ShippingRates;

use BCSample\Shipping\Helper\SampleFixtureLoader;
use Psr\Log\LoggerInterface;

class StubbedShippingRateAPIService implements SimpleRateAPIServiceInterface
{
    /** @var SampleFixtureLoader */
    private $fixtureLoader;

    /** @var LoggerInterface */
    private $logger;

    /**
     * @param SampleFixtureLoader $fixtureLoader
     * @param LoggerInterface $logger
     */
    public function __construct(SampleFixtureLoader $fixtureLoader, LoggerInterface $logger)
    {
        $this->fixtureLoader = $fixtureLoader;
        $this->logger = $logger;
    }

    /**
     * @param array $requestPayload
     * @return array
     */
    public function getRates(array $requestPayload)
    {
        $countryCode = $this->getDestinationCountryCode($requestPayload);
        $this->logger->info('Received rate request for country code.', ['countryCode' => $countryCode]);
        $this->logger->info('Zone options provided.', $requestPayload['zone_options'] ?? []);
        $this->logger->info('Connection options provided.', $requestPayload['connection_options'] ?? []);

        return $this->fixtureLoader->getFixtureForCountryMappings($countryCode);
    }

    private function getDestinationCountryCode($requestPayload)
    {
        return $requestPayload['base_options']['destination']['country_iso2'];
    }
}
