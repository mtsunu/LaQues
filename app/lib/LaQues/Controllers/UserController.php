<?php namespace LaQues\Controllers;

class UserController extends \BaseController
{
	public function login()
	{
		return \View::make('user.login');
	}

	public function doLogin()
	{
		$input = array(
            //'email'    => \Input::get( 'username' ), // May be the username too
            'username' => \Input::get( 'username' ), // so we have to pass both
            'password' => \Input::get( 'password' ),
        );

        if(\Confide::logAttempt($input)) {
        	return \Redirect::to('admin');
        }
	}
}