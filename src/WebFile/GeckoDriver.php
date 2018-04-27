<?php

namespace CodeceptionSkeleton\WebFile;

/**
* 
*/
class GeckoDriver extends \CodeceptionSkeleton\WebFile
{
    /**
     * The version of the driver that will be downloaded.
     * @var string
     */
    public static $version = '0.20.1';

    /**
     * File name.
     * @var string
     */
    public static $fileName = 'geckodriver.tar.gz';

    /**
     * Template of the link where the file is hosted.
     * @var string
     */
    public static $urlFile = 'https://github.com/mozilla/geckodriver/releases/download/v{version}/geckodriver-v{version}-{os}.tar.gz';

    public static function buildUrl(): string {
        return strtr(self::$urlFile, [
            '{version}' => self::$version,
            '{os}' => self::$defaultOS,
        ]);
    }
}