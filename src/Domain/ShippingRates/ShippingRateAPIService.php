<?php

namespace BCSample\Shipping\Domain\ShippingRates;

use BCSample\Shipping\Helper\FixtureLoader;

class ShippingRateAPIService
{
    /** @var FixtureLoader */
    private $fixtureLoader;

    /**
     * ShippingRateAPIService constructor.
     * @param FixtureLoader $fixtureLoader
     */
    public function __construct(FixtureLoader $fixtureLoader)
    {
        $this->fixtureLoader = $fixtureLoader;
    }

    /**
     * @param array $requestPayload
     * @return array
     */
    public function getRates(array $requestPayload)
    {
        // add your logic here for any validation, transforming the request and retrieving rates and serializing the response

        // sample response coming back here
        return $this->fixtureLoader->loadJson('sampleResponse.json');
    }
}
