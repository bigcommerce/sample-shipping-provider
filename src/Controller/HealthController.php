<?php

namespace BCSample\Shipping\Controller;

use Symfony\Component\HttpFoundation\Response;

class HealthController
{
    public function health(): Response
    {
        return new Response('OK', 200, ['content-type' => 'text/plain; charset=UTF-8']);
    }
}
