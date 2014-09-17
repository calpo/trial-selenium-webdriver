<?php
namespace TrialSeleniumWebdriverTest;

class WebDriverScenarioTestCase extends \PHPUnit_Framework_TestCase
{
    protected static $driver;

    public static function setUpBeforeClass()
    {
        static::$driver = \RemoteWebDriver::create(
            'http://localhost:4444/wd/hub',
            array(
                \WebDriverCapabilityType::BROWSER_NAME
                => \WebDriverBrowserType::FIREFOX,
                //=> \WebDriverBrowserType::HTMLUNIT,
            )
        );
    }

    public static function tearDownAfterClass()
    {
        static::$driver->quit();
    }

    protected function buildUrl($path)
    {
        $url = 'file://' . ROOT . '/tests/fixtures' . $path;

        if (preg_match('/\/$/', $path)) {
            $url .= 'index.html';
        }

        return $url;
    }
}
