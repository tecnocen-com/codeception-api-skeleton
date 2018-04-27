<?php

namespace CodeceptionSkeleton\WebFile;

/**
* 
*/
class SeleniumDriver extends \CodeceptionSkeleton\WebFile
{
    /**
     * The version of the driver that will be downloaded.
     * @var string
     */
    public static $version = '3.11.0';

    /**
     * File name.
     * @var string
     */
    public static $fileName = 'selenium-ss.jar';

    /**
     * Template of the link where the file is hosted.
     * @var string
     */
    public static $urlFile = 'http://selenium-release.storage.googleapis.com/{small-version}/selenium-server-standalone-{version}.jar';

    public static function buildUrl(): string {
        return strtr(self::$urlFile, [
            '{small-version}' => substr(self::$version, 0, strpos(self::$version, '.', 2)),
            '{version}' => self::$version,
        ]);
    }
}