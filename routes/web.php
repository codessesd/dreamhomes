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
Route::get('register', function () {return view('register');})->middleware('guest');
Route::POST('register','RegistrationController@register');
Route::get('verify/{email_token}/{token}','RegistrationController@verify');
Route::get('setPassword',function () {return view('setPassword');});
Route::POST('setPassword','PasswordController@firstPassword');
Route::get('app-step1', function () {return view('app_step1');});//->middleware('auth');
Route::get('forgotPassword',function(){return view('forgotPass');})->middleware('guest');
Route::POST('forgotPassword','PasswordController@createResetToken');
Route::get('resetPassword/{email}/{reset_token}','PasswordController@resetPassword');
Route::POST('newPassword','PasswordController@newPassword');
Route::get('login', function () {return view('login');})->name('login')->middleware('guest');
Route::POST('login','SessionsController@userLogin');
//Route::get('dogaccess/{key}','AdminController@dogaccess');

Route::get('download-form',function(){
  //works on the live website
    $file= public_path()."/DREAM HOMES STOKVEL NEW MEMBERSHIP APPLICATION FORM.pdf";
    $headers = array('Content-Type: application/pdf',);
    return Response::download($file, 'DREAM HOMES STOKVEL NEW MEMBERSHIP APPLICATION FORM.pdf', $headers);
});

//user routes
Route::get('logout','SessionsController@logoutUser')->middleware('auth');
Route::get('profile',function(){return view('profile');})->name('profile')->middleware('member');
Route::POST('storeFile','DocumentsController@storeFile')->middleware('member');
Route::get('files/{action}/{id}','DocumentsController@downloadOrDelete')->middleware('member');
Route::get('apply/{step}','ApplicationController@show')->middleware('auth');
Route::get('apply/step3/remove/{id}','ApplicationController@removeBeneficiary')->middleware('auth');
Route::POST('apply/{step}','ApplicationController@store')->middleware('auth');

//admin routes
Route::get('completed','MemberController@completed')->middleware('admin1');
Route::get('pending','MemberController@pending')->middleware('admin1');
Route::get('members','MemberController@all')->middleware('admin1');
Route::POST('updateMember','MemberController@update')->middleware('admin1');
//Route::POST('updateMember','MemberController@update')->middleware('admin3');
Route::get('admin/files/download/{id}','DocumentsController@adminFileDownload')->middleware('admin1');
Route::get('admin/files/delete/{id}','DocumentsController@adminFileDelete')->middleware('admin4');
Route::get('admins','AdminController@show')->middleware('admin4')->name('admins');;
Route::POST('addAdmin','AdminController@addAdmin')->middleware('admin4');
Route::POST('updateAdmin','AdminController@updateAdmin')->middleware('admin4');
Route::get('deleteAdmin/{id}','AdminController@deleteAdmin');
//Route::POST('testAdmin','AdminController@addAdmin')->middleware('admin5');