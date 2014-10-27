<?php
namespace TrialSeleniumWebdriverTest\Oshietegoo;

use \TrialSeleniumWebdriverTest\Util;

class PostQuestionFromQuestionPageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function 質問ページから質問投稿する() {
//        $basic_user = '*******';
//        $basic_pass = '*******';
//        $gooid_user = '*******';
//        $gooid_pass = '*******';
//        $domain = '*****.goo.ne.jp';
        require(__DIR__ . '/../config.php');

        $basic_user = urlencode($basic_user);
        $basic_pass = urlencode($basic_pass);

        $title = 'タイトル' . time();
        $description = '本文' . time();

        $driver = Util::createDriver();

        Util::loginToGoo($driver, $gooid_user, $gooid_pass);

        $driver->get("http://{$basic_user}:{$basic_pass}@{$domain}/question");

        $driver->findElement(\WebDriverBy::id('title_area'))->sendKeys($title);
        $driver->findElement(\WebDriverBy::id('text_area'))->sendKeys($description);

        $driver->findElement(\WebDriverBy::cssSelector('#question_confirm_btn > a > span.q-text'))->click();

        Util::skipPageLenvingAlert($driver);

        $driver->wait(5)->until(
            \WebDriverExpectedCondition::visibilityOfElementLocated(
                \WebDriverBy::cssSelector('#match_categories > input')
            )
        );

        $driver->findElement(\WebDriverBy::cssSelector('#question_complete_button > a'))->click();

        $driver->findElement(\WebDriverBy::cssSelector('li.tooSeeBtn > a'))->click();

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
