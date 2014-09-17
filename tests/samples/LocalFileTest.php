<?php
use \TrialSeleniumWebdriverTest\Util;

class SimpleSampleTest extends PHPUnit_Framework_TestCase
{
    public function testGoogle() {
        $web_driver = Util::createDriver();

        $web_driver->get(Util::buildUrl('/'));

        echo $web_driver->getTitle();
        echo $web_driver->findElement(WebDriverBy::id('id1'))->getText();

        $web_driver->takeScreenshot(ROOT . '/tests/tmp/sc.png');

        $web_driver->quit();
    }
}
