<?php

use Composer\Script\Event;

class ComposerListener
{
    const DEFAULT_SELENIUM_VERSION = '3.6.0';
    const DEFAULT_GECKODRIVER_VERSION = '0.18.0';
    const DEFAULT_CHROMEDRIVER_VERSION = '2.32';
    const SELENIUM_FILENAME = 'selenium-ss.jar';
    const GECKODRIVER_FILENAME = 'geckodriver.tar.gz';
    const CHROMEDRIVER_FILENAME = 'chromedriver.zip';
    
    const SUPPORTED_OPERATIVE_SYSTEMS = [
        'linux32',
        'linux64',
        'mac64',
        'win32',
    ];

    /**
     * @param  Event  $event
     */
    public static function downloadSelenium(Event $event)
    {
        $args = self::parseArguments($event->getArguments());
        self::downloadFile(
            self::SELENIUM_FILENAME,
            self::buildSeleniumUrl(
                $args['selenium'] ?? self::DEFAULT_SELENIUM_VERSION
            )
        );
    }

    /**
     * @param  Event  $event
     */
    public static function downloadDrivers(Event $event)
    {
        $args = self::parseArguments($event->getArguments());
        $os = $args['os'] ?? self::determineOS();
        $gdVersion = $args['gdVersion'] ?? self::DEFAULT_GECKODRIVER_VERSION;
        $cdVersion = $args['cdVersion'] ?? self::DEFAULT_CHROMEDRIVER_VERSION;
        if (!in_array($os, self::SUPPORTED_OPERATIVE_SYSTEMS)) {
            $event->stopPropagation();
            echo "Provided OS '$os' is not supported.\n";
            exit(1);
        }
        self::downloadFile(
            self::GECKODRIVER_FILENAME,
            self::buildGeckoDriverUrl($os, $gdVersion)
        );
        self::downloadFile(
            self::CHROMEDRIVER_FILENAME,
            self::buildChromeDriverUrl($os, $cdVersion)
        );
    }

    private static function determineOS(): string
    {
        return strtolower(php_uname('s')) . (8 * PHP_INT_SIZE);
    }

    private static function buildGeckoDriverUrl(
        string $os,
        string $version
    ): string {
        return 'https://github.com/mozilla/geckodriver/releases/download/'
            . "v{$version}/geckodriver-v{$version}-{$os}.tar.gz";
    }

    private static function buildChromeDriverUrl(
        string $os,
        string $version
    ): string {
        return "https://chromedriver.storage.googleapis.com/{$version}/"
            . "chromedriver_{$os}.zip";
    }

    private static function buildSeleniumUrl(string $version): string
    {
        return 'http://selenium-release.storage.googleapis.com/'
            . substr($version, 0, 3)
            . "/selenium-server-standalone-{$version}.jar";
    }

    private static function downloadFile($filename, $url)
    {
        echo "Downloading $url into $filename.\n";
        stream_copy_to_stream(
            fopen($url, 'r'),
            fopen($filename, 'w')
        );
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
