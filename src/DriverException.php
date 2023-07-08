<?php

namespace App;

use Exception;

final class DriverException extends Exception
{
    public static function assertChromeDriverExists(Driver $driver)
    {
        if (is_null($driver->chromeDriver)) {
            throw new self("ChromeDriver instance is not running");
        }
    }
}
