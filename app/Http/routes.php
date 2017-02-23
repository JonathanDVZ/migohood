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

Route::get('/','IndexController@index');
Route::get('/registeruser','UserController@index');
Route::get('/accessuser','Auth\AuthController@getLogin');
Route::get('/becomeahost','BecomeHostController@index');
Route::get('/firststep','FirstStepController@index');

/*
Route::get('/accessuser', function () {
    return view('login.access-user-front');
});
*/
