<?php

namespace App;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

abstract class Driver
{
    private const DEFAULT_USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36';
    private const DEFAULT_RESOLUTION = '1920,1080';
    protected RemoteWebDriver $chromeDriver;

    /**
     * @return void
     */
    protected function chromeDriver()
    {
        $options = new ChromeOptions();

        $options->addArguments([
            '--window-size=' . self::DEFAULT_RESOLUTION,
            // '--incognito',
            '--user-agent=' . self::DEFAULT_USER_AGENT,
            // '--user-data-dir=C:\Users\Miljan\AppData\Local\Google\Chrome\User',
            // '--headless',
        ]);
        // $options->addExtensions(['test.crx']);
        $options->setExperimentalOption('excludeSwitches', ['enable-automation']);

        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability('-enablePassThrough', 'false');
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);

        $this->chromeDriver = RemoteWebDriver::create(desired_capabilities: $capabilities);
    }
}
