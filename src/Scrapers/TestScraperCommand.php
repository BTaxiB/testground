<?php

namespace App\Scrapers;

use App\CommandInterface;
use App\Driver;
use App\DriverException;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverKeys;

final class TestScraperCommand extends Driver implements CommandInterface
{
    private const TARGET_URL = 'https://www.maxi.rs/online/Picje-kafa-i-chaj/c/01';

    public function __construct()
    {
        $this->chromeDriver();
    }

    /**
     * @inheritDoc
     * @throws DriverException
     */
    public function execute(): void
    {
        DriverException::assertChromeDriverExists($this->chromeDriver);
        $this->chromeDriver->get(self::TARGET_URL);

        /**
         * Wait until catalog is loaded. Maximum of 10 seconds.
         */
        $this->chromeDriver
            ->wait(10, 500)
            ->until(WebDriverExpectedCondition::visibilityOfElementLocated(
                WebDriverBy::xpath('//a[@data-testid="product-block-name-link"]')
            ));

        /**
         * Find all drinks in catalog and dump them in .txt file.
         */
        $drinkCatalog = $this->chromeDriver->findElements(WebDriverBy::xpath('//a[@data-testid="product-block-name-link"]'));

        $catalog = [];
        $dump = fopen("dump_catalog.txt", "w") or die("Unable to open file!");
        foreach($drinkCatalog as $drink) {
            fwrite($dump, $drink->getAttribute('innerHTML') . PHP_EOL);
            $catalog[] = $drink->getAttribute('innerHTML');
        }
        fclose($dump);
    }

}
