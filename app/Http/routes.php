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
Route::get('/home','IndexController@index');
Route::get('/registeruser','UserController@index');
Route::get('/accessuser','Auth\AuthController@getLogin');
Route::get('/secondstepspace','UserController@secondstepspace');
Route::get('/becomeahost','UserController@becomeahost');
Route::post('/createuser','UserController@CreateUser');
Route::post('/postlogin','UserController@postLogin');

// Routes for the space creation{
    Route::get('/space-create/place-type','CreateSpaceController@First');
    Route::get('/space-create/bedrooms','CreateSpaceController@Second1');
    Route::get('/space-create/bedrooms/edit-bedrooms','CreateSpaceController@Second2');
    Route::get('/space-create/bedrooms/edit-bedrooms/add-bed','CreateSpaceController@Second3');
    Route::get('/space-create/baths','CreateSpaceController@Third');
    Route::get('/space-create/location','CreateSpaceController@Fourth');
    Route::get('/space-create/amenities','CreateSpaceController@Fifth');
    Route::get('/space-create/hosting','CreateSpaceController@Sixth');
//}