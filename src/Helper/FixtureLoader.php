<?php

namespace BCSample\Shipping\Helper;

class FixtureLoader
{
    const DIRECTORY_SEPARATOR = '/';

    /**
     * @param $filename
     * @return array|null
     */
    public function loadJson($filename)
    {
        return json_decode($this->loadFile($filename), true);
    }

    /**
     * @param $filename
     * @return bool|string
     */
    public function loadFile($filename)
    {
        return file_get_contents(FIXTURES_DIR . DIRECTORY_SEPARATOR . $filename);
    }
}
