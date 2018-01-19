<?php

namespace BCSample\Shipping\Helper;

/**
 * Contains a mapping from iso2 country code to a fixture file name
 */
class SampleFixtureCountryMap
{
    private static $defaultCountry = 'US';

    private static $mapping = [
        'US' => [
            'countryName' => 'United States',
            'description' => '2 carriers, 3 rates similar to NZ response',
            'filename' => 'sampleResponse.json',
        ],
        'CA' => [
            'countryName' => 'Canadia',
            'description' =>
                'Response with 3 quotes with a dispatch and a transit time, 
                from one carrier, with no carrier info, with rate ids
                ',
            'filename' => 'sampleResponseWithTimeInfo.json',
        ],
        'AU' => [
            'countryName' => 'Australia',
            'description' =>
                'Response with 3 quotes with info and warning messages, 
                from one carrier, with no carrier info, with no rate ids',
            'filename' => 'sampleResponseWithWarnings.json',
        ],
        'NZ' => [
            'countryName' => 'New Zealand',
            'description' =>
                'Response with rates for 2 carriers, one with a single rate and 
	            one with 2 rates, both with carrier info',
            'filename' => 'sampleResponseFromMultipleCarriers.json',
        ],
        'JP' => [
            'countryName' => 'Japan',
            'description' => 'Response with empty quote list',
            'filename' => 'sampleResponseWithEmptyQuotes.json',
        ],
        'AG' => [
            'countryName' => 'Antigua and Barbuda',
            'description' => 'Response with missing top level "messages" key',
            'filename' => 'sampleInvalidResponse1.json',
        ],
        'AQ' => [
            'countryName' => 'Antarctica',
            'description' => 'Response with missing top level "quote_id" key',
            'filename' => 'sampleInvalidResponse2.json',
        ],
        'AI' => [
            'countryName' => 'Anguilla',
            'description' => 'Response with missing top level "carrier_quotes" key',
            'filename' => 'sampleInvalidResponse3.json',
        ],
        'BS' => [
            'countryName' => 'Bahamas',
            'description' => 'Response with a rate with missing "cost" key',
            'filename' => 'sampleInvalidResponse4.json',
        ],
        'BH' => [
            'countryName' => 'Bahrain',
            'description' => 'Response with a carrier info with missing "code" key',
            'filename' => 'sampleInvalidResponse5.json',
        ],
        'BD' => [
            'countryName' => 'Bangladesh',
            'description' => 'Response with a rate with a message missing a "type" key',
            'filename' => 'sampleInvalidResponse6.json',
        ]
    ];

    public static function getEntryForCountryCode($countryCode)
    {
        return self::$mapping[$countryCode] ?? self::$mapping[self::$defaultCountry];
    }

    public static function getMapping()
    {
        return self::$mapping;
    }

    /**
     * @return string
     */
    public static function getDefaultCountry()
    {
        return self::$defaultCountry;
    }
}
