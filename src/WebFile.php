<?php

namespace CodeceptionSkeleton;

/**
* 
*/
class WebFile
{
    /**
     * The version of the driver that will be downloaded.
     * @var string
     */
    public static $version;

    /**
     * File name.
     * @var string
     */
    public static $fileName;

    /**
     * Default OS.
     * @var string
     */
    public static $defaultOS;

    /**
     * Template of the link where the file is hosted.
     * @var string
     */
    public static $urlFile;

    public static function buildUrl() {
        return strtr(static::$urlFile, [
            '{version}' => static::$version,
        ]);
    }

    public static function download()
    {
        stream_copy_to_stream(
            fopen(static::buildUrl(), 'r'),
            fopen(static::$fileName, 'w')
        );
    }
}