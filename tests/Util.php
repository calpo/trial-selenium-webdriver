<?php
namespace TrialSeleniumWebdriverTest;

class Util
{
    public static function createDriver()
    {
        return \RemoteWebDriver::create(
            'http://localhost:4444/wd/hub',
            \DesiredCapabilities::firefox()
//            \DesiredCapabilities::htmlunit()
        );
    }

    public static function buildUrl($path)
    {
        $url = 'file://' . ROOT . '/tests/fixtures' . $path;

        if (preg_match('/\/$/', $path)) {
            $url .= 'index.html';
        }

        return $url;
    }
}
