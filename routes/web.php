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
Route::get('setPassword',function () {return view('setPassword');});
Route::POST('setPassword','PasswordController@firstPassword');
Route::get('app-step1', function () {return view('app_step1');});
Route::get('login', function () {return view('login');})->name('login')->middleware('guest');
Route::get('forgotPassword',function(){return view('forgotPass');})->middleware('guest');
Route::POST('forgotPassword','PasswordController@createResetToken');
Route::get('resetPassword/{email}/{reset_token}','PasswordController@resetPassword');
Route::POST('newPassword','PasswordController@newPassword');
Route::POST('login','SessionsController@userLogin');
Route::get('logout','SessionsController@logoutUser')->middleware('auth');
Route::get('profile',function(){return view('profile');})->name('profile')->middleware('auth');
Route::POST('storeFile','DocumentsController@storeFile')->middleware('auth');
Route::get('files/{action}/{id}','DocumentsController@downloadOrDelete')->middleware('auth');

Route::get('download-form',function(){
  //works on the live website
    $file= public_path()."/DREAM HOMES STOKVEL NEW MEMBERSHIP APPLICATION FORM.pdf";
    $headers = array('Content-Type: application/pdf',);
    return Response::download($file, 'DREAM HOMES STOKVEL NEW MEMBERSHIP APPLICATION FORM.pdf', $headers);
});
