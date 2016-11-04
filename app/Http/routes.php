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
Route::get('test',function(){
	return "asdsa";
});
Route::get('',['as'=>'getRegisterTaylor','uses'=>'ParfaromeController@getRegisterTaylor']);
Route::post('parfarome-taylor',['as'=>'postRegisterTaylor','uses'=>'ParfaromeController@postRegisterTaylor']);
Route::get('thankyou',['as'=>'thankyou','uses'=>'ParfaromeController@thankyou']);

Route::get('reportAPI',array('as'=>'parfarome-report','uses'=>'ParfaromeController@getReport'));
// REFRESH CAPTCHA
Route::post('refresh-captcha',array('as'=>'refresh-captcha','uses'=>'ParfaromeController@refreshcaptcha'));

Route::get('listcity',['uses'=>'ParfaromeController@getListCity']);
Route::get('listClient',['uses'=>'ParfaromeController@buildXMLClient']);
Route::get('getClient',['uses'=>'ParfaromeController@getListClient']);

Route::post('getClient',['as'=>'ajaxShop','uses'=>'ParfaromeController@getListClient']);