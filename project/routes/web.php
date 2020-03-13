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

// The backend 
Route::get('/home', 'Backend\HomeController@index');
Route::get('/account', 'Backend\HomeController@index');
Route::get('/account/dashboard', 'Backend\HomeController@dashboard');
Route::get('/account/edit', 'Backend\EditAccountController@index');
Route::post('/account/edit', 'Backend\EditAccountController@store');
Route::get('/manage/news', 'Backend\Staff\NewsController@index');
Route::get('/manage/news/create', 'Backend\Staff\NewsController@create');
Route::post('/manage/news/create', 'Backend\Staff\NewsController@store');
Route::get('/manage/news/{news}/edit', 'Backend\Staff\NewsController@edit');
Route::post('/manage/news/{news}/edit', 'Backend\Staff\NewsController@update');
Route::delete('/manage/news/{news}/edit', 'Backend\Staff\NewsController@delete');

Route::get('/manage/rss', 'Backend\Staff\RssController@index');
Route::get('/manage/rss/create', 'Backend\Staff\RssController@create');
Route::post('/manage/rss/create', 'Backend\Staff\RssController@store');
Route::get('/manage/rss/{rss_feed}/edit', 'Backend\Staff\RssController@edit');
Route::post('/manage/rss/{rss_feed}/edit', 'Backend\Staff\RssController@update');
Route::delete('/manage/rss/{rss_feed}/edit', 'Backend\Staff\RssController@delete');


// Login Controller
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Forgot Password Controller
Route::get('forgot', 'Auth\ForgotPasswordController@index');
Route::post('forgot', 'Auth\ForgotPasswordController@submit');


// Password Controller
Route::get('/account/password/change', 'Auth\ChangePasswordController@index');
Route::post('/account/password/change', 'Auth\ChangePasswordController@store');

// Administrator
Route::get('/users', 'Backend\Staff\Administrator\UsersController@index');
Route::get('/user/{user}', 'Backend\Staff\Administrator\UsersController@view');
Route::get('/user/{user}/change_password', 'Backend\Staff\Administrator\UsersController@change_password');
Route::post('/user/{user}/change_password', 'Backend\Staff\Administrator\UsersController@change_password_submit');
Route::post('/user/{user}/ban', 'Backend\Staff\Administrator\UsersController@ban_user');
Route::post('/user/{user}/unban', 'Backend\Staff\Administrator\UsersController@unban_user');

Route::post('admin/login_to_account', 'Backend\Staff\Administrator\UsersController@login_to_account');
Route::post('admin/restore_to_admin', 'Backend\Staff\Administrator\ReturnToAdminController@restore_to_admin');
