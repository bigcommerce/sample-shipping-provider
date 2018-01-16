<?php

namespace BCSample\Shipping\Domain\ShippingRates;

use BCSample\Shipping\Helper\SampleFixtureCountryMap;
use BCSample\Shipping\Helper\SampleFixtureLoader;

class StubbedShippingRateAPIService implements SimpleRateAPIService
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

        $this->fixtureLoader->getFixtureForCountryMappings($countryCode);
    }

    private function getDestinationCountryCode($requestPayload)
    {
        return $requestPayload['base_options']['origin']['country_iso2'];
    }


}
