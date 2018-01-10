<?php

namespace BCSample\Shipping\Domain\ShippingRates;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ShippingRateAPIController
{
    /** @var ShippingRateAPIService */
    private $rateAPIService;

    /**
     * ShippingRateAPIController constructor.
     * @param ShippingRateAPIService $rateAPIService
     */
    public function __construct(ShippingRateAPIService $rateAPIService)
    {
        $this->rateAPIService = $rateAPIService;
    }

    public function getRates(Request $request)
    {
        $requestPayload = json_decode($request->getContent(), true);

        if (!$this->validatePayload($requestPayload)) {
            return new JsonResponse($this->buildErrorResponseBody('Badly formatted request'));
        }

        try {
            $result = $this->rateAPIService->getRates($requestPayload);
        } catch (Exception $e) {
            return new JsonResponse($this->buildErrorResponseBody($e->getMessage()));
        }

        return new JsonResponse($result);
    }

    private function buildErrorResponseBody(string $message)
    {
        return [
            'messages' => [
                [
                    'text' => $message,
                    'type' => 'ERROR',
                ]
            ]
        ];
    }

    private function validatePayload($requestPayload)
    {
        return !is_null($requestPayload) && is_array($requestPayload);
    }
}
