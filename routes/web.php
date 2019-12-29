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

Route::get('/', function () {return view('index');});
Route::get('about', function () {return view('about');});
Route::get('contact', function () {return view('contact');});
Route::get('register', function () {return view('register');});
Route::POST('register','RegistrationController@register');
Route::get('verify/{email_token}/{token}','RegistrationController@verify');
Route::get('setPassword',function () {return view('setPassword');});///////
Route::POST('setPassword','PasswordController@firstPassword');
Route::get('app-step1', function () {return view('app_step1');});
Route::get('login', function () {return view('login');});
