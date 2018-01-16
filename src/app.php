<?php

use BCSample\Shipping\Helper\SampleFixtureLoader;
use BCSample\Shipping\Provider\ShippingRateServiceProvider;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;

$app = new Application();
// default middleware
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());


$app[SampleFixtureLoader::class] = function ()
{
    return new SampleFixtureLoader();
};

// app specific dependencies
$app->register(new ShippingRateServiceProvider());


$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

return $app;
