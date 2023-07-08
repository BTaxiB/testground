<?php


namespace App\Automation\Scrapers;

use App\Driver;
use App\DriverException;

abstract class AbstractScraperCommand extends Driver
{
    public function __construct(Driver $driver)
    {
        parent::__construct();
        $this->driver = $driver->chromeDriver;
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
