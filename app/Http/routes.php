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

// PARFAROME TAYLOR
Route::get('/',['as'=>'getRegisterTaylor','uses'=>'ParfaromeController@getRegisterTaylor']);
Route::post('parfarome-taylor',['as'=>'postRegisterTaylor','uses'=>'ParfaromeController@postRegisterTaylor']);

Route::post('thankyou',['as'=>'thankyou','uses'=>'ParfaromeController@thankyou']);

Route::get('parfarome-report',array('as'=>'parfarome-report','uses'=>'ParfaromeController@getReport'));
Route::get('parfarome-download',array('as'=>'parfarome-download','uses'=>'ParfaromeController@getDownloadReport'));
// REFRESH CAPTCHA
Route::post('refresh-captcha',array('as'=>'refresh-captcha','uses'=>'ParfaromeController@refreshcaptcha'));
