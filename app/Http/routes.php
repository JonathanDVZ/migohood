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
Route::post('/createuser','UserController@CreateUser');
Route::get('/postlogin','UserController@postLogin');
Route::get('/PlaceType','CreateSpaceController@First');
Route::get('/Bedrooms-1','CreateSpaceController@Second1');
Route::get('/Bedrooms-2','CreateSpaceController@Second2');
Route::get('/Bedrooms-3','CreateSpaceController@Second3');
Route::get('/Bedrooms-4','CreateSpaceController@Second4');
Route::get('/Bedrooms-5','CreateSpaceController@Second5');
Route::get('/Baths','CreateSpaceController@Third');
Route::get('/Locations','CreateSpaceController@Fourth');
Route::get('/Amenities','CreateSpaceController@Fifth');
Route::get('/Hosting','CreateSpaceController@Sixth');








