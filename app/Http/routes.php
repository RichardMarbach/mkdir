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

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function() {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getAdminDashboard']);

        Route::get('customers', ['as' => 'admin.dashboard.customers', 'uses' => 'DashboardController@getAdminCustomers']);
        Route::get('dvds', ['as' => 'admin.dashboard.dvds', 'uses' => 'DashboardController@getAdminDvds']);
        Route::get('rentals', ['as' => 'admin.dashboard.rentals', 'uses' => 'DashboardController@getAdminRentals']);
    });
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

Route::get('/dvds', 'DVDController@index');

// DVD creation routes
Route::get('/createDVD', 'Admin\DVDController@createDVD');

// DVD listing route
Route::get('/dvds', 'DVDController@index');

// DVD search route
Route::get('/dvds/search/genre/{genre}', ['as' => 'dvds.genre', 'uses' => 'DVDController@genre']);
Route::get('/dvds/search', ['as' => 'dvds.search', 'uses' => 'DVDController@search']);

// DVD showing route(only 1 dvd)
Route::get('/dvds/{id}', ['as' => 'dvds.show', 'uses' => 'DVDController@show']);

// api
Route::group(['prefix' => 'api'], function() {
    // Customer
    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', ['as' => 'customer.index', 'uses' => 'CustomerController@index']);
        Route::post('/', ['as' => 'customer.store', 'uses' => 'CustomerController@store']);
        Route::get('{id}', ['as' => 'customer.show', 'uses' => 'CustomerController@show']);
        Route::put('{id}', ['as' => 'customer.update', 'uses' => 'CustomerController@update']);
        Route::delete('{id}', ['as' => 'customer.destroy', 'uses' => 'CustomerController@destroy']);
    });

    // dvds
    Route::group(['prefix' => 'dvds'], function() {
        Route::post('/', ['as' => 'dvd.store', 'uses' => 'DVDController@store']);
        Route::put('{id}', ['as' => 'dvds.update', 'uses' => 'DVDController@update']);
        Route::delete('{id}', ['as' => 'dvds.destroy', 'uses' => 'DVDController@destroy']);
        Route::post('{id}/rental', ['as' => 'dvds.rent', 'uses' => 'DVDController@rent']);
    });

    // Rentals
    Route::group(['prefix' => 'rentals'], function() {
        Route::post('/', ['as' => 'rentals.store', 'uses' => 'RentalController@store']);
        Route::put('{id}', ['as' => 'rentals.update', 'uses' => 'RentalController@update']);
        Route::delete('{id}', ['as' => 'rentals.destroy', 'uses' => 'RentalController@destroy']);
    });
});