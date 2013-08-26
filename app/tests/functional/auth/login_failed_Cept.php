<?php
$I = new TestGuy\MemberSteps($scenario);
$I->wantTo('see a messages if I login with invalid username/password');

//Given
$user = [
	'username' => 'bagong',
	'password' => 'qwerty',
	'email'	   => 'bagong@qwerty.com'
];
$I->haveAUser($user);

//When
$I->login(['username' => 'bagong', 'password' => 'passwordsalah']);

//Then
$I->shouldBeOnPage(LoginPage::URL);
$I->seeInSession('errors');
$I->shouldSeeErrorMessage('Invalid Username/Password');