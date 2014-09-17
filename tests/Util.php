<?php
namespace TrialSeleniumWebdriverTest;

class Util
{
    public static function createDriver()
    {
        return \RemoteWebDriver::create(
            'http://localhost:4444/wd/hub',
            \DesiredCapabilities::firefox()
        );
    }
}
