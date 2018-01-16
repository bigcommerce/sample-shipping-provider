<?php

namespace BCSample\Shipping\Domain\ShippingRates;

use BCSample\Shipping\Helper\SampleFixtureLoader;

class StubbedShippingRateAPIService implements SimpleRateAPIServiceInterface
{
    /** @var SampleFixtureLoader */
    private $fixtureLoader;

    /**
     * ShippingRateAPIService constructor.
     * @param SampleFixtureLoader $fixtureLoader
     */
    public function __construct(SampleFixtureLoader $fixtureLoader)
    {
        $this->fixtureLoader = $fixtureLoader;
    }

    /**
     * @param array $requestPayload
     * @return array
     */
    public function getRates(array $requestPayload)
    {
        $countryCode = $this->getDestinationCountryCode($requestPayload);

        return $this->fixtureLoader->getFixtureForCountryMappings($countryCode);
    }

    private function getDestinationCountryCode($requestPayload)
    {
        return $requestPayload['base_options']['destination']['country_iso2'];
    }
}
