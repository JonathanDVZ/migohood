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
Route::get('/accessuser','UserController@getLogin');
Route::get('/becomeahost','UserController@becomeahost');
Route::post('/createuser','UserController@CreateUser');
Route::post('/postlogin','UserController@postLogin');
Route::get('/logout','UserController@logout');

// Routes for the space creation{ 
    Route::get('/create-space/place-type','CreateSpaceController@First');
    Route::post('/create-space/add-place-type','CreateSpaceController@AddPlaceType');
    Route::get('/create-space/bedrooms','CreateSpaceController@Second1');
    Route::post('/create-space/add-bedrooms','CreateSpaceController@AddBedrooms');
    Route::get('/create-space/bedrooms/edit-bedrooms','CreateSpaceController@Second2');
    // editada a post
    Route::post('/create-space/bedrooms/edit-bedrooms/add-bed','CreateSpaceController@Second3');
    Route::post('/create-space/bedrooms/edit-bedrooms/save-beds','CreateSpaceController@SaveBeds');
    Route::post('/create-space/baths/show-bathroom','CreateSpaceController@ShowBathroom');
    Route::get('/create-space/baths','CreateSpaceController@Third');
    Route::post('/create-space/baths/add-baths','CreateSpaceController@AddBaths');
    Route::get('/create-space/location','CreateSpaceController@Fourth');
    Route::get('/create-space/amenities','CreateSpaceController@Fifth');
    Route::get('/create-space/hosting','CreateSpaceController@Sixth');
    Route::get('/create-space/basics','CreateSpaceController@Seventh');
    Route::get('/create-space/listing','CreateSpaceController@Eigth');
    Route::get('/create-space/photos','CreateSpaceController@Ninth');
    Route::get('/create-space/services','CreateSpaceController@Tenth');
    Route::get('/create-space/notes','CreateSpaceController@Eleven');
    Route::get('/create-space/co-host','CreateSpaceController@Twelve');
//}

// Routes for the service creation{ 
    Route::get('/create-service/category','CreateServiceController@Category');
    Route::get('/create-service/hosting','CreateServiceController@Hosting');
    Route::get('/create-service/basics','CreateServiceController@Basics');
    Route::get('/create-service/photos','CreateServiceController@Photos');
    Route::get('/create-service/location','CreateServiceController@Location');
    Route::get('/create-service/notes','CreateServiceController@Notes');
    Route::get('/create-service/co-host','CreateServiceController@CoHost');
//}

//Social Login{
//Route::get('social/{provider?}', 'SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback'); 
// New social Login
Route::get('/social/{action}/{provider}', 'SocialController@getSocialAuth'); 
//}