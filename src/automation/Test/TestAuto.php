<?php


namespace App\Automation\Test;

use App\Automation\Logic\Automatic;
use Facebook\WebDriver\WebDriverBy as LOCATE;
use Facebook\WebDriver\WebDriverKeys as PRESS;

class TestAuto extends Automatic
{


    function __construct() {
        parent::__construct();
    }


    function execute() {
        $this->driver->get("https://www.google.com/");

        $this->driver->findElement(Locate::name('q'))->sendKeys(["Miljan Joksimovic Developer", PRESS::ENTER]);

        $test = $this->driver->findElements(Locate::xpath('//a[contains(.,"Faculty")]'));

        $this->driver->get($test[0]->getAttribute("href"));

        die();
    }
}