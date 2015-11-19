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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/test', function() {
  return 'Secret';
})->middleware('role:admin');

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function() {
    Route::get('dashboard', ['as' => 'admin.dashbaord', 'uses' => 'DashboardController@getAdminDashboard']);
});

// User routes
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@getUserDashboard']);
Route::put('/users/{userId}', ['as' => 'user.update', 'uses' => 'UserController@update']);


// Authentication routes
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

//DVD creation routes
Route::get('/createDVD', 'Admin\DVDController@createDVD');
Route::get('/dvds', 'DVDController@index');

Route::get('/dvds/{id}', ['as' => 'dvds.show','uses' => function() {}]);
