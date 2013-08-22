<?php
$I = new TestGuy\MemberSteps($scenario);
$I->wantTo('login to the application');

//Given
$user = [
	'username' => 'bagong',
	'password' => 'qwerty'
];
$I->haveAUser($user);

//When
$I->amOnPage(LoginPage::URL);

//Then
$I->shouldSeeLoginForm();

//When
$I->login($user);

//Then
$I->shouldBeOnPage(HomePage::URL);