<?php
namespace TrialSeleniumWebdriverTest;

class Util
{
    public static function createDriver()
    {
        return \RemoteWebDriver::create(
            'http://localhost:4444/wd/hub',
            \DesiredCapabilities::firefox()
//            \DesiredCapabilities::chrome()
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

    public static function loginToGoo($driver, $goo_id, $password)
    {
        require(__DIR__ . '/config.php');

        $driver->get('https://login.mail.goo.ne.jp/id/authn/LoginStart');

        $driver->findElement(\WebDriverBy::id('uname'))->sendKeys($goo_id);
        $element = $driver->findElement(\WebDriverBy::id('pass'));
        $element = $element->sendKeys($password);
        $element->submit();
    }

    public static function skipPageLenvingAlert($driver)
    {
        try {
            $driver->switchTo()->alert()->accept();
        } catch (\Exception $e) {
        }
    }

    public static function clearData()
    {
    }

    public static function loadData()
    {
    }

    public static function saveData()
    {
    }
}
