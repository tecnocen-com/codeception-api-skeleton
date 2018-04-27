<?php

namespace CodeceptionSkeleton;

use CodeceptionSkeleton\WebFile\{
    SeleniumDriver,
    ChromeDriver,
    GeckoDriver
};

class Installer
{
    const DEFAULT_CHROMEDRIVER_VERSION = '';
    const SELENIUM_FILENAME = '';
    
    const SUPPORTED_OPERATIVE_SYSTEMS = [
        'linux32',
        'linux64',
        'mac64',
        'win32',
    ];

    /**
     */
    public static function downloadSelenium($args)
    {
        if (isset($args['selenium'])) {
            SeleniumDriver::$version = $args['selenium'];
        }
        SeleniumDriver::download();
    }

    /**
     */
    public static function downloadDrivers($args)
    {
        $os = $args['os'] ?? self::determineOS();

        if (!in_array($os, self::SUPPORTED_OPERATIVE_SYSTEMS)) {
            // $event->stopPropagation();
            echo "Provided OS '$os' is not supported.\n";
            exit(1);
        }

        GeckoDriver::$defaultOS = $os;
        GeckoDriver::$version = $args['gdVersion'] ?? GeckoDriver::$version;

        ChromeDriver::$defaultOS = $os;
        ChromeDriver::$version = $args['cdVersion'] ?? ChromeDriver::$version;

        GeckoDriver::download();
        ChromeDriver::download();
    }

    private static function determineOS(): string
    {
        return strtolower(php_uname('s')) . (8 * PHP_INT_SIZE);
    }

    /**
     * Arguments in string are parsed to key-pair values.
     *
     * ```php
     * $args = self::parseArguments([
     *     'opt=value',
     *     'foo=bar'
     * ]);
     *
     * print_r($args);
     * ```
     *
     * The output will be:
     *
     * > Array
     * > (
     * >    [opt] => value
     * >    [foo] => bar
     * > )
     *
     * @param  array[]  $args
     * @return array[]
     */
    public static function parseArguments(array $args)
    {
        $parsed = [];
        foreach ($args as $arg) {
            $parse = explode('=', $arg);
            if (!isset($parse[1])) {
                $parsed[$parse[0]] = true;
            } else {
                $parsed[$parse[0]] = $parse[1];
            }
        }

        return $parsed;
    }

}
