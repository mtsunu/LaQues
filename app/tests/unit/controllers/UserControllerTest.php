<?php

class UserControllerTest extends TestCase
{
	public function testShouldRouteToLoginPage()
	{
		$this->call('get', 'login');

		$this->assertResponseOk();
	}
} 