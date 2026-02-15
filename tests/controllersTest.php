<?php

use BCSample\Shipping\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class controllersTest extends WebTestCase
{
    protected static function getKernelClass(): string
    {
        return Kernel::class;
    }

    public function testGetHomepage(): void
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertStringContainsString(
            'This is a sample implementation of a customer Shipping Carrier Service integration with BigCommerce.',
            $crawler->filter('body')->text()
        );
    }

    public function testRatesReturnsFixtureForValidPayload(): void
    {
        $client = $this->createClient();

        $client->request(
            'POST',
            '/sample-carrier-service/rates',
            server: ['CONTENT_TYPE' => 'application/json'],
            content: json_encode([
                'base_options' => [
                    'destination' => [
                        'country_iso2' => 'US',
                    ],
                ],
            ])
        );

        $this->assertResponseIsSuccessful();

        $expected = json_decode((string) file_get_contents(__DIR__.'/../fixtures/sampleResponse.json'), true);
        $this->assertSame(
            json_encode($expected, JsonResponse::DEFAULT_ENCODING_OPTIONS),
            $client->getResponse()->getContent()
        );
    }

    public function testRatesReturnsBadlyFormattedRequestForInvalidJson(): void
    {
        $client = $this->createClient();

        $client->request(
            'POST',
            '/sample-carrier-service/rates',
            server: ['CONTENT_TYPE' => 'application/json'],
            content: '{'
        );

        $this->assertResponseIsSuccessful();
        $this->assertSame(
            json_encode([
                'messages' => [
                    [
                        'text' => 'Badly formatted request',
                        'type' => 'ERROR',
                    ],
                ],
            ], JsonResponse::DEFAULT_ENCODING_OPTIONS),
            $client->getResponse()->getContent()
        );
    }
}
