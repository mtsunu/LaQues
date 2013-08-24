<?php

class UserControllerTest extends TestCase
{
	public function testShouldRouteToLoginPage()
	{
		$this->call('get', 'login');

		$this->assertResponseOk();
	}

	public function testLoginSuccess()
	{
		$input = ['username' => 'paijo', 'password' => 'rahasia'];
		Confide::shouldReceive('logAttempt')
				->once()
				->with($input)
				->andReturn(TRUE);

		$this->call('POST', 'doLogin', $input);

		$this->assertRedirectedTo('/admin');
	}
} 