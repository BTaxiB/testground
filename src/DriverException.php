<?php

namespace App;

use Exception;
use Facebook\WebDriver\Remote\RemoteWebDriver;

final class DriverException extends Exception
{
    /**
     * @param RemoteWebDriver $driver
     * @return void
     * @throws DriverException
     */
    public static function assertChromeDriverExists(RemoteWebDriver $driver): void
    {
        if ($driver === null) {
            throw new self("ChromeDriver instance is not running");
        }
    }
}
