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

Route::get('/', function () {
    return view('welcome');
});


// Home controller
Route::get('/', 'HomeController@index');


// Login Controller
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Forgot Password Controller
Route::get('forgot', 'Auth\ForgotPasswordController@index');
Route::post('forgot', 'Auth\ForgotPasswordController@submit');
