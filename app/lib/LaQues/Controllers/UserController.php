<?php namespace LaQues\Controllers;

class UserController extends \BaseController
{
	public function login()
	{
		return \View::make('user.login');
	}
}