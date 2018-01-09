<?php

namespace BCSample\Shipping\Domain\ShippingRates;

use Symfony\Component\HttpFoundation\JsonResponse;

class ShippingRateAPIController
{
    public function getRates()
    {
        $x = "abc";
        return new JsonResponse([$x]);
    }
}
