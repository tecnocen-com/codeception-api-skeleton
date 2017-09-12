<?php

use Codeception\Example;

class LoginCest
{
    /**
     * @dataprovider dataLogin
     */
    public function login(AcceptanceTester $I, Example $example)
    {
        $I->amOnPage('/');
        $I->see('Sign In');
        $I->seeInCurrentUrl('/login'); // test autoredirect.
        $I->fillField('#inputEmail3', $example['email']);
        $I->fillField('#inputPassword3', $example['password']);
        $I->click('form button[type="submit"]');
        if ($example['success']) {
            $I->dontSee('Login Failed');
        } else {
            $I->see('Login Failed');
        }
    }

    protected function dataLogin()
    {
        return [
            [
                'email' => 'angel@gmail.com',
                'password' => 's3cr3t',
                'success' => false,
            ],
            [
                'email' => 'ed.fetyko@etchasoft.com',
                'password' => 'password',
                'success' => true,
            ],
        ];
    }
}
