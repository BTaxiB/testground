<?php

namespace App\Automation;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use App\Models\Database;

final class Driver
{
    const HOST = 'http://localhost:4444/wd/hub';
    protected RemoteWebDriver $chromeDriver;
    protected Database $database;

    public function __construct(Database $database)
    {
        $this->chromeDriver = $this->chromeDriver();
        $this->database = $database;
    }

    protected function chromeDriver()
    {
        $options = new ChromeOptions();

        $options->addArguments([
            '--window-size=1920,1080',
            // '--incognito',
            '--user-agent=Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
            // '--user-data-dir=C:\Users\Miljan\AppData\Local\Google\Chrome\User',
            // '--headless',
        ]);
        // $options->addExtensions(['test.crx']);
        $options->setExperimentalOption('excludeSwitches', ['enable-automation']);

        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability('-enablePassThrough', 'false');
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);

        return RemoteWebDriver::create(self::HOST, $capabilities);
    }
}
