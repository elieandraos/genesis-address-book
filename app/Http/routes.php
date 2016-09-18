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

Route::group(['middleware' => ['guest']], function(){
	//login
	Route::get('login', ['uses' => 'LoginController@index', 'as' => 'auth.login']);
	Route::post('/attempt-login', ['uses' => 'LoginController@authenticate', 'as' => 'auth.login.attempt']);
	Route::get('auth/{provider}', ['uses' => 'LoginController@redirectToProvider', 'as' => 'auth.provider']);
	Route::get('auth/{provider}/callback', ['uses' => 'LoginController@handleProviderCallback', 'as' => 'auth.provider.callback']);
	//register
	Route::get('/register', ['uses' => 'RegisterController@index', 'as' => 'auth.register']);
	Route::post('/register/store', ['uses' => 'RegisterController@store', 'as' => 'auth.register.store']);
});

Route::group(['middleware' => ['auth']], function(){
	//logout 
	Route::get('/logout', ['uses' => 'LoginController@logout', 'as' => 'auth.logout']);
	//contacts
	Route::get('/home', ['uses' => 'ContactsController@index', 'as' => 'contacts.index']);
	Route::get('/contacts/create', ['uses' => 'ContactsController@create', 'as' => 'contacts.create'])->middleware('ajax');
	Route::post('/contacts/store', ['uses' => 'ContactsController@store', 'as' => 'contacts.store'])->middleware('ajax');
});

