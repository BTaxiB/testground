<?php


namespace App\Automation\Test;

use App\Driver;
use App\DriverException;
use Facebook\WebDriver\WebDriverBy as LOCATE;
use Facebook\WebDriver\WebDriverKeys as PRESS;

abstract class AbstractScraperCommand extends Driver
{
   public function __construct(Driver $driver)
   {
      $this->driver = $driver;
   }

   public function execute()
   {
      DriverException::assertChromeDriverExists($this->driver);
   }

   protected function toCSV()
   {
      //template method
   }

   protected function toJSON()
   {
      //template method
   }

   protected function toArray()
   {
      //template method
   }
}
