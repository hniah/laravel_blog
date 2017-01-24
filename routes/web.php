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
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
// Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');
Route::get('/home', 'HomeController@index');


/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'Admin\DashboardsController@index')->name('dashboard');;
    Route::get('dashboard', 'Admin\DashboardsController@index');
    Route::resource('languages', 'Admin\LanguagesController');
});


