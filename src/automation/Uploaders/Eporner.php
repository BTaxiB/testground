<?php

namespace App\Automation\Uploaders;

use App\Automation\Logic\Automatic;
use App\Controllers\ItemController;
use Facebook\WebDriver\Exception\WebDriverException;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverKeys;

class Eporner extends Automatic
{
    public function __construct()
    {
        parent::__construct();
        $this->setUrl('https://www.eporner.com/');
        $this->setUsername('testerinokka');
        $this->setPassword('password123');
    }

    public function execute()
    {
        $item = new ItemController;
        $item = json_decode($item->getAll());
        $item->username = $this->getUsername();
        $item->password = $this->getPassword();
        $item->file = '/dump/gay2.mp4';

        $item->type = 3; //1 straight, 2 gay, 3 trans

        $tags = explode(",", $item->tags);
        $categories = explode(",", $item->tags);

        //use tags and categories for input, bigger chance of finding video later.
        $catags = array_unique(array_merge($tags, $categories), SORT_STRING);

        if ($item) {
            try {
                $this->driver->get($this->getUrl() . "login/");
                //login
                $this->driver->wait()->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::xpath('//form[@id="loginform"]//input[@name="login"]')));
                $this->driver->findElement(WebDriverBy::xpath('//form[@id="loginform"]//input[@name="login"]'))->sendKeys([$item->username, WebDriverKeys::TAB, $item->password, WebDriverKeys::ENTER]);
                $this->driver->wait()->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::xpath('//a[.="Logout"]')));

                $this->driver->get($this->getUrl() . 'upload_do/');

                //tags, title input
                $this->driver->findElement(WebDriverBy::xpath('/html/body/div[1]/main/form/table/tbody/tr[3]/td[2]/input'))->sendKeys($item->shortTitle);
                $this->driver->findElement(WebDriverBy::id('keytext'))->sendKeys(implode(',', $catags));
                $this->driver->findElement(WebDriverBy::xpath("//*[@id='typerow']/label[2]"))->click();

                //alerts disabled on trans video
                if (3 === $item->type) {
                    $this->driver->executeScript('window.alert = function() {};');
                }

                //tags input
                $cat = 0;
                foreach ($catags as $category) {
                    $clickablecat = $this->driver->findElements(WebDriverBy::xpath("//*[@id='uploadtable']/tbody/tr[6]/td/div//label[contains(translate(text(), '" . strtoupper($category) . " ', '" . $category . "'), '" . $category . "')]"));

                    if ($clickablecat && $cat < 8) {
                        $clickablecat[0]->click();

                        ++$cat;
                    }
                }

                //description input
                $this->driver->findElement(WebDriverBy::cssSelector('#uploaddiv textarea'))->sendKeys($item->description);
                $this->driver->findElement(WebDriverBy::xpath("//input[@type='file']"))->sendKeys($item->file);

                //submit
                $this->driver->findElement(WebDriverBy::xpath("//input[@type='submit']"))->click();

                //uploading
                $this->driver->wait($this->execTime, 3000)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::xpath('//*[@id="fileprogress"]/td/div[1]/div/div[.="100%"]')));
                $this->driver->findElement(WebDriverBy::id('upformsubmitbtn'))->click();

                //status check
                $this->driver->wait()->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id('good')));

                $ss = time() . get_class($this) . $this->driver->getSessionID() . '_success.png';
                $this->driver->takeScreenshot($ss);
                // $this->driver->quit();
                exit(0);
            } catch (WebDriverException $e) {
                $ss = time() . get_class($this) . $this->driver->getSessionID() . '_error.png';
                $this->driver->takeScreenshot($ss);
                // $this->driver->quit();
            }
        }
    }
}
