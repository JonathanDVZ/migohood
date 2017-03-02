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
Route::get('/secondstepspace','UserController@secondstepspace');
Route::get('/becomeahost','UserController@becomeahost');
Route::get('/firststep','UserController@firststep');
Route::get('/amenities','UserController@amenities');
Route::get('/description','UserController@description');
Route::get('/UnderConstruction','IndexController@construction');





