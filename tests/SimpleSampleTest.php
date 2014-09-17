<?php
require_once __DIR__ . '/bootstrap.php';

use \TrialSeleniumWebdriverTest\Util;

class SimpleSampleTest extends PHPUnit_Framework_TestCase
{
    public function testGoogle() {
        $web_driver = Util::createDriver();

        $web_driver->get("http://www.google.com");

        $element = $web_driver->findElement(WebDriverBy::name("q"));
        if ($element) {
            $element->sendKeys("Browserstack");
            $element->submit();
        }   
        $web_driver->quit();
    }
}
