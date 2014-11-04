<?php
namespace TrialSeleniumWebdriverTest;

class Util
{
    const HUB_URL = 'http://localhost:4444/wd/hub';

    public static function createDriver()
    {
        return \RemoteWebDriver::create(
            static::HUB_URL,
            \DesiredCapabilities::firefox()
//            \DesiredCapabilities::chrome()
//            \DesiredCapabilities::htmlunit()
        );
    }

    public static function createSmartPhoneUaDriver($ua = '')
    {
        $ua = $ua ?: 'Mozilla/5.0 ' .
            '(iPhone; CPU iPhone OS 5_0 like Mac OS X) ' .
            'AppleWebKit/534.46 (KHTML, like Gecko) ' .
            'Version/5.1 Mobile/9A334 Safari/7534.48.3';

        return static::createUserAgentSpecifiedFirefoxDriver($ua);
    }

    private static function createUserAgentSpecifiedFirefoxDriver($ua)
    {
        $profile = new \FireFoxProfile();
        $profile->setPreference('general.useragent.override', $ua);

        $caps = \DesiredCapabilities::firefox();
        $caps->setCapability(\FirefoxDriver::PROFILE, $profile);

        return \RemoteWebDriver::create(
            static::HUB_URL,
            $caps
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
        require(ROOT . '/tests/config.php');

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
