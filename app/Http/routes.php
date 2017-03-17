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
Route::get('/logout','UserController@logout');

// Routes for the space creation{
    Route::get('/create-space/place-type','CreateSpaceController@First');
    Route::get('/create-space/bedrooms','CreateSpaceController@Second1');
    Route::get('/create-space/bedrooms/edit-bedrooms','CreateSpaceController@Second2');
    Route::get('/create-space/bedrooms/edit-bedrooms/add-bed','CreateSpaceController@Second3');
    Route::get('/create-space/baths','CreateSpaceController@Third');
    Route::get('/create-space/location','CreateSpaceController@Fourth');
    Route::get('/create-space/amenities','CreateSpaceController@Fifth');
    Route::get('/create-space/hosting','CreateSpaceController@Sixth');
//}

//Social Login{
Route::get('social/{provider?}', 'SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback');    
//}