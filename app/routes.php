<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('survey/{id}/participate', 'LaQues\Controllers\ParticipationController@create');

Route::get('login', 'LaQues\Controllers\UserController@login');
Route::post('doLogin', 'LaQues\Controllers\UserController@doLogin');

Route::get('admin', function() { return 'tes'; });