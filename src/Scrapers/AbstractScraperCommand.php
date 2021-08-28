<?php


namespace App\Automation\Test;

use App\Automation\Driver;
use Facebook\WebDriver\WebDriverBy as LOCATE;
use Facebook\WebDriver\WebDriverKeys as PRESS;

abstract class AbstractScraperCommand extends Driver
{
   abstract function execute();
}