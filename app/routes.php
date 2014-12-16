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
// route to show the login form



Route::get('users/login', array('uses' => 'UsersController@showLogin'));

// route to process the form
Route::post('users/login', array('uses' => 'UsersController@doLogin'));

Route::group(array('before' => 'auth'), function() 
{
	
	
	Route::get('/', function()
	{ 

		return View::make('pages.home')->with('page_title','Welcome to Laravel Home Page');
	});
     
	Route::get('users', array('uses' => 'UsersController@get_index'));
	Route::post('usersview', array('uses' => 'UsersController@show'));
    Route::get('lab-information', array('uses' => 'LabInformationController@get_index'));
    Route::post('lab-information', array('uses' => 'LabInformationController@get_index'));
    
	Route::post('update_user/{id}', 'UsersController@update');
	Route::post('create_user/', 'UsersController@create');
	Route::post('destroy_user', 'UsersController@destroy');
	
	Route::get('users/logout', array(
        'as' => 'logout',
        'uses' => 'UsersController@getSignOut'
    ));
     
	
});

