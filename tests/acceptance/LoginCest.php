<?php

use yii\helpers\Url;

class LoginCest
{
    public function ensureThatLoginWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Inicio de sesión', 'b');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', 'james');
        $I->fillField('input[name="LoginForm[password]"]', '123456');
        $I->click('login-button');
        $I->wait(2); // wait for button to be clicked

        $I->expectTo('see user info');
        $I->see('Logout');
    }
}
