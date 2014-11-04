<?php
namespace TrialSeleniumWebdriverTest\Oshietegoo;

use \TrialSeleniumWebdriverTest\Util;

class SmartPhoneLoginTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function gooIDログインする() {
        require(ROOT . '/tests/config.php');

        $driver = Util::createSmartPhoneUaDriver();

        $driver->get('https://login.mail.goo.ne.jp/id/authn/LoginStart');

        $driver->findElement(\WebDriverBy::id('uname'))->sendKeys($gooid_user);
        $element = $driver->findElement(\WebDriverBy::id('pass'));
        $element = $element->sendKeys($gooid_pass);
        $element->submit();
    }
}
