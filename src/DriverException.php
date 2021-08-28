<?php

namespace App;

final class DriverException extends \Exception
{
    public static function assertChromeDriverExists(Driver $driver)
    {
        if ($driver->chromeDriver === null) {
            throw new self("ChromeDriver instance is not running");
        }
    }
}
