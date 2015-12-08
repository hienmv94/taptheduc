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


Route::group(array('before' => 'admin'), function(){
	Route::get('/admin','AdminController@index');
	Route::get('/admin/add','AdminController@create');
	Route::post('/admin/add','AdminController@store');
	Route::get('/admin/action','AdminController@action');
	Route::get('/admin/{id}/update','AdminController@edit');
	Route::post('/admin/{id}/update','AdminController@update');
	Route::get('/admin/{id}','AdminController@show');
	Route::get('/admin/{id}/images','AdminController@editImage');
	Route::post('/admin/{id}/images','AdminController@updateImage');
});

// login with Facebook
Route::get('facebook/login','Auth\AuthController@loginFacebook');
Route::get('auth/callback/facebook','Auth\AuthController@postLoginFacebook');
Route::get('/getcode/facebook','FacebookController@getCode');
Route::get('/callback/facebook','FacebookController@saveAccessToken');


// login with Google
Route::get('google/login','Auth\AuthController@loginGoogle');
Route::get('auth/callback/google','Auth\AuthController@postLoginGoogle');
Route::get('/getcode/google','GoogleController@getCode');
Route::get('/callback/google','GoogleController@saveAccessToken');

// logout

Route::get('logout','Auth\AuthController@logout');

//nguoi dung
Route::get('/', 'HomeController@index');
Route::get('/quanlydiadiem', 'HomeController@manager');
Route::post('/timkiem','HomeController@search');
Route::get('/ketqua','HomeController@result');
Route::get('/themdiadiem','HomeController@create');
Route::post('/themdiadiem','HomeController@store');

Route::get('/diadiem/{id}','HomeController@show');



	Route::get('/diadiem/{id}/capnhat','HomeController@edit');
	Route::post('/diadiem/{id}/capnhat','HomeController@update');
	Route::get('/diadiem/{id}/anh','HomeController@editImage');
	Route::post('/diadiem/{id}/anh','HomeController@updateImage');
