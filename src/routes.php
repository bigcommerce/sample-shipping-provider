<?php

use BCSample\Shipping\Domain\ShippingRates\ShippingRateAPIController;

$api = $app['controllers_factory'];

$api->post('/rates', ShippingRateAPIController::class.':getRates');

$app->mount('/sample-carrier-service/', $api);
