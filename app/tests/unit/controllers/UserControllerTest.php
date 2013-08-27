<?php

use Mockery as m;

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
				->with(m::subset($input))
				->andReturn(TRUE);

		$this->call('POST', 'doLogin', $input);

		$this->assertRedirectedTo('/admin');
	}

	public function testLoginFailed()
	{
		$input = ['username' => 'paijo', 'password' => 'rahasia'];
		Confide::shouldReceive('logAttempt')
				->once()
				->with(m::subset($input))
				->andReturn(FALSE);

		$this->call('POST', 'doLogin', $input);

		$this->assertRedirectedTo('login');
		$this->assertSessionHasErrors();
	}
} 