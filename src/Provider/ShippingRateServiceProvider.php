<?php

namespace BCSample\Shipping\Provider;

use BCSample\Shipping\Domain\ShippingRates\ShippingRateAPIController;
use BCSample\Shipping\Domain\ShippingRates\StubbedShippingRateAPIService;
use BCSample\Shipping\Helper\SampleFixtureLoader;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ShippingRateServiceProvider
 *
 * Silex provider to register all the bits of the shipping rate service in the DI Container
 *
 * @package BCSample\Shipping\Provider
 */
class ShippingRateServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app[StubbedShippingRateAPIService::class] = new StubbedShippingRateAPIService(
            $app[SampleFixtureLoader::class],
            $app['monolog']
        );
        $app[ShippingRateAPIController::class] = new ShippingRateAPIController($app[StubbedShippingRateAPIService::class]);
    }
}
