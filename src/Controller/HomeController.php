<?php

namespace BCSample\Shipping\Controller;

use BCSample\Shipping\Helper\SampleFixtureCountryMap;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{
    public function __construct(
        private readonly Environment $twig,
    ) {
    }

    public function index(): Response
    {
        return new Response($this->twig->render('index.html.twig', [
            'fixtures' => SampleFixtureCountryMap::getMapping(),
            'defaultCountryCode' => SampleFixtureCountryMap::getDefaultCountry(),
        ]));
    }
}
