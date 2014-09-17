<?php
use \TrialSeleniumWebdriverTest\WebDriverUnitTestCase ;
use \TrialSeleniumWebdriverTest\Util ;

class SampleUnitTest extends WebDriverUnitTestCase 
{
    public function testGoogle() {
        $this->driver->get(Util::buildUrl('/'));

        echo $this->driver->getTitle();
        echo $this->driver->findElement(WebDriverBy::id('id1'))->getText();

        $this->driver->takeScreenshot(ROOT . '/tests/tmp/sc.png');
    }
}
