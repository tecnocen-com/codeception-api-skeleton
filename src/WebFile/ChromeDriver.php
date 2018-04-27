<?php

namespace CodeceptionSkeleton\WebFile;

/**
* 
*/
class ChromeDriver extends \CodeceptionSkeleton\WebFile
{
    /**
     * The version of the driver that will be downloaded.
     * @var string
     */
    public static $version = '2.38';

    /**
     * File name.
     * @var string
     */
    public static $fileName = 'chromedriver.zip';

    /**
     * Template of the link where the file is hosted.
     * @var string
     */
    public static $urlFile = 'https://chromedriver.storage.googleapis.com/{version}/chromedriver_{os}.zip';

    public static function buildUrl(): string {
        return strtr(self::$urlFile, [
            '{version}' => self::$version,
            '{os}' => self::$defaultOS,
        ]);
    }
}