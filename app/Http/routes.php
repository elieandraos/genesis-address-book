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
	Route::get('/home', ['uses' => 'ContactsController@index', 'as' => 'contacts.index']);
	Route::get('contacts/search', ['uses' => 'ContactsController@search', 'as' => 'contacts.search']);

	Route::group(['middleware' => ['auth', 'ajax']], function(){
		//Make these requests only available via ajax (browser will return 404)
		//Edit and Delete have an extra security layer with middleware that checks that the user owns the contact.
		Route::get('/contacts/create', ['uses' => 'ContactsController@create', 'as' => 'contacts.create']);
		Route::post('/contacts/store', ['uses' => 'ContactsController@store', 'as' => 'contacts.store']);
		Route::get('/contacts/reload', ['uses' => 'ContactsController@reload', 'as' => 'contacts.reload']);
		Route::get('/contacts/{contactId}/show', ['uses' => 'ContactsController@show', 'as' => 'contacts.show'])->middleware('ownsContact');
		Route::get('/contacts/{contactId}/edit', ['uses' => 'ContactsController@edit', 'as' => 'contacts.edit'])->middleware('ownsContact');
		Route::post('/contacts/{contactId}/update', ['uses' => 'ContactsController@update', 'as' => 'contacts.update'])->middleware('ownsContact');
		Route::post('/contacts/{contactId}/delete', ['uses' => 'ContactsController@destroy', 'as' => 'contacts.delete'])->middleware('ownsContact');
	});	
});

