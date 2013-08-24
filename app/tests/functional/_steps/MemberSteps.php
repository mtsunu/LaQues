<?php
namespace TestGuy;

use LaQues\Database\Eloquent\User;
use LoginPage;

class MemberSteps extends \TestGuy
{
	public function haveAUser($user)
	{
		$u = new User;
		$u->username = $user['username'];
		$u->password = $user['password'];
		$u->save();
	}

	public function shouldSeeLoginForm()
	{
		$I = $this;

		$I->seeElement(LoginPage::$formElement);
		$I->seeElement(LoginPage::$usernameField);
		$I->seeElement(LoginPage::$passwordField);
		$I->seeElement(LoginPage::$loginButton);
	}

	public function login($user)
	{
		$I = $this;

		$I->fillFIeld(LoginPage::$usernameField, $user['username']);
		$I->fillFIeld(LoginPage::$passwordField, $user['password']);
		$I->click(LoginPage::$loginButton);
	}

	public function shouldBeOnPage($page)
	{
		$I = $this;

		$I->seeCurrentUrlEquals($page);
	}
}