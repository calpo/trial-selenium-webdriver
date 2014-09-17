<?php
namespace TrialSeleniumWebdriverTest;

class WebDriverUnitTestCase extends \PHPUnit_Framework_TestCase
{
    protected $driver;

    protected function setUp()
    {
        $this->driver = \RemoteWebDriver::create(
            'http://localhost:4444/wd/hub',
            array(
                \WebDriverCapabilityType::BROWSER_NAME
                => \WebDriverBrowserType::FIREFOX,
                //=> \WebDriverBrowserType::HTMLUNIT,
            )
        );
    }

    protected function tearDown()
    {
        $this->driver->quit();
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
