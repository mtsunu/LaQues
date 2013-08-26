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
		$u->password_confirmation = $user['password'];
		$u->email = $user['email'];
		$u->save();

		$I = $this;
		$I->seeInDatabase('users', ['username' => $user['username']]);
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