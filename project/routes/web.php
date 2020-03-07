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


// Home controller
Route::get('/', 'HomeController@index');


// Login Controller
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Forgot Password Controller
Route::get('forgot', 'Auth\ForgotPasswordController@index');
Route::post('forgot', 'Auth\ForgotPasswordController@submit');


// Password Controller
Route::get('/password/change', 'Auth\ChangePasswordController@index');
Route::post('/password/change', 'Auth\ChangePasswordController@store');

// Administrator
Route::get('/users', 'Backend\Administrator\UsersController@index');
Route::get('/user/{user}', 'Backend\Administrator\UsersController@view');
Route::get('/user/{user}/change_password', 'Backend\Administrator\UsersController@change_password');
Route::post('/user/{user}/change_password', 'Backend\Administrator\UsersController@change_password_submit');
Route::post('/user/{user}/ban', 'Backend\Administrator\UsersController@ban_user');
Route::post('/user/{user}/unban', 'Backend\Administrator\UsersController@unban_user');

Route::post('admin/login_to_account', 'Backend\Administrator\UsersController@login_to_account');
Route::post('admin/restore_to_admin', 'Backend\Administrator\ReturnToAdminController@restore_to_admin');
