<?php
use \TrialSeleniumWebdriverTest\WebDriverScenarioTestCase ;
use \TrialSeleniumWebdriverTest\Util ;

class SampleUnitTest extends WebDriverScenarioTestCase 
{
    public function testGoogle() {
        static::$driver->get(Util::buildUrl('/'));

        echo static::$driver->getTitle();
        echo static::$driver->findElement(WebDriverBy::id('id1'))->getText();

        static::$driver->takeScreenshot(ROOT . '/tests/tmp/sc.png');
    }

    public function testGoogle2() {
        static::$driver->get(Util::buildUrl('/'));

        echo static::$driver->getTitle();
        echo static::$driver->findElement(WebDriverBy::id('id1'))->getText();

        static::$driver->takeScreenshot(ROOT . '/tests/tmp/sc1.png');
    }
}
