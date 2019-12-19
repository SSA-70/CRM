<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Group of routes for AUTH USERS ONLY
 */
Route::group(['middleware' => 'auth'], function () {

    Route::resource('clients', 'ClientsController');

    /*
     * Group of routes for IS_ADMIN ONLY
     */
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('users', 'UsersController');
    });

    Route::get('/', function () {
        return redirect('clients');
    });
});

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
