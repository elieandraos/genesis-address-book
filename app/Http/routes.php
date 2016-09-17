<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [ 'uses' => 'GuestController@index', 'as' => 'guest.home']);
Route::get('auth/{provider}', 'LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'LoginController@handleProviderCallback');
