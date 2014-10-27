<?php
use \TrialSeleniumWebdriverTest\Util;

class PostQuestionFromQuestionPageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function 質問ページから質問投稿する() {
        $basic_user = urlencode('******@****.co.jp');
        $basic_pass = urlencode('*******');
        $gooid_user = '*******';
        $gooid_pass = '*******';
        $domain = '*****.goo.ne.jp';

        $title = 'タイトル' . time();
        $description = '本文' . time();

        $driver = Util::createDriver();

        $driver->get('https://login.mail.goo.ne.jp/id/authn/LoginStart');

        $driver->findElement(WebDriverBy::id('uname'))->sendKeys($gooid_user);
        $element = $driver->findElement(WebDriverBy::id('pass'));
        $element = $element->sendKeys($gooid_pass);
        $element->submit();

        $driver->get("http://{$basic_user}:{$basic_pass}@{$domain}/question");

        $driver->findElement(WebDriverBy::id('title_area'))->sendKeys($title);
        $driver->findElement(WebDriverBy::id('text_area'))->sendKeys($description);

        $driver->findElement(WebDriverBy::cssSelector('#question_confirm_btn > a > span.q-text'))->click();
        $driver->switchTo()->alert()->accept();

        $driver->wait(5)->until(
            WebDriverExpectedCondition::visibilityOfElementLocated(
                WebDriverBy::cssSelector('#match_categories > input')
            )
        );

        $driver->findElement(WebDriverBy::cssSelector('#question_complete_button > a'))->click();

        $driver->findElement(WebDriverBy::cssSelector('li.tooSeeBtn > a'))->click();

        $actual_title = $driver->getTitle();
        $url = $driver->getCurrentUrl();
        preg_match('/\/qa\/(\d+)\.html/', $url, $matches);
        $qid = $matches[1];

        $trimed_title = preg_replace('/ - .+/', '', $actual_title);

        echo $actual_title ."\n";
        echo $url ."\n";
        echo $qid ."\n";

        $driver->quit();

        $this->assertEquals($title, $trimed_title);
    }
}
