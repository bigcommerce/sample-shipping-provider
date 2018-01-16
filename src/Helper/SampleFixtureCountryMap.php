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
            'description' =>
                'Response with 3 quotes with a dispatch and a transit time, 
                from one carrier, with no carrier info, with rate ids
                ',
            'filename' => 'sampleResponseWithTimeInfo.json',
        ],
        'AU' => [
            'description' =>
                'Response with 3 quotes with info and warning messages, 
                from one carrier, with no carrier info, with no rate ids',
            'filename' => 'sampleResponseWithWarnings.json',
        ],
        'NZ' => [
            'description' =>
                'Response with rates for 2 carriers, one with a single rate and 
	            one with 2 rates, both with carrier info',
            'filename' => 'sampleResponseFromMultipleCarriers.json',
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
