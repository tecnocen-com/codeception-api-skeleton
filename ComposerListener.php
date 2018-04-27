<?php

use CodeceptionSkeleton\Installer;
use Composer\Script\Event;

class ComposerListener
{
    /**
     * @param  Event  $event
     */
    public static function downloadSelenium(Event $event)
    {
        $args = Installer::parseArguments($event->getArguments());
        Installer::downloadSelenium($args);
    }

    /**
     * @param  Event  $event
     */
    public static function downloadDrivers(Event $event)
    {
        $args = Installer::parseArguments($event->getArguments());
        Installer::downloadDrivers($args);
    }
}
