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

Route::get('/choose-space','CreateSpaceController@ChooseSpace');



// Routes for the space creation{
    Route::get('/create-space/place-type','CreateSpaceController@First');
    //Route::post('/create-space/place-type','CreateSpaceController@FirstPost');
    Route::post('/create-space/add-place-type','CreateSpaceController@AddPlaceType');
    Route::get('/create-space/bedrooms','CreateSpaceController@Second1');
    //Route::post('/create-space/bedrooms','CreateSpaceController@Second1Post');
    Route::post('/create-space/add-bedrooms','CreateSpaceController@AddBedrooms');
    Route::get('/create-space/bedrooms/edit-bedrooms','CreateSpaceController@Second2');
    // editada a post
    Route::post('/create-space/bedrooms/edit-bedrooms/add-bed','CreateSpaceController@Second3');
    Route::post('/create-space/bedrooms/edit-bedrooms/save-beds','CreateSpaceController@SaveBeds');
    //Route::post('/create-space/baths/show-bathroom','CreateSpaceController@ShowBathroom');
    Route::get('/create-space/baths','CreateSpaceController@Third');
    //Route::post('/create-space/baths','CreateSpaceController@ThirdPost');
    Route::post('/create-space/baths/add-baths','CreateSpaceController@AddBaths');
    Route::get('/create-space/location','CreateSpaceController@Fourth');
    //Route::post('/create-space/location','CreateSpaceController@FourthPost');
    Route::post('/create-space/save-location','CreateSpaceController@SaveLocation');
    Route::get('/create-space/amenities','CreateSpaceController@Fifth');
    //Route::post('/create-space/amenities','CreateSpaceController@FifthPost');
    Route::post('/create-space/save-amenities','CreateSpaceController@SaveAmenities');
    Route::get('/create-space/hosting','CreateSpaceController@Sixth');

    Route::post('/create-space/save-hosting','CreateSpaceController@SaveHosting');
    //Route::post('/create-space/hosting','CreateSpaceController@SixthPost');

    Route::get('/create-space/basics','CreateSpaceController@Seventh');
    Route::post('/create-space/save-basics','CreateSpaceController@SaveBasics');
    Route::get('/create-space/listing','CreateSpaceController@Eigth');
    Route::post('/create-space/save-listing','CreateSpaceController@SaveListing');
    Route::get('/create-space/photos','CreateSpaceController@Ninth');
    Route::post('/create-space/save-photos','CreateSpaceController@NinthSave');
    Route::get('/create-space/services','CreateSpaceController@Tenth');
    Route::post('/create-space/save-services','CreateSpaceController@SaveServices');
    Route::get('/create-space/notes','CreateSpaceController@Eleven');
    Route::post('/create-space/save-notes','CreateSpaceController@ElevenAdd');
    Route::get('/create-space/notes/emergency-number','CreateSpaceController@ElevenEmergency');
    Route::post('/create-space/notes/emergency-number','CreateSpaceController@ElevenEmergecyAdd');
    Route::get('/create-space/co-host','CreateSpaceController@Twelve');
    Route::get('/create-space/preview-overview','CreateSpaceController@Preview1');
    Route::get('/create-space/preview-reviews','CreateSpaceController@Preview2');
    Route::get('/create-space/preview-host','CreateSpaceController@Preview3');
    Route::get('/create-space/preview-location','CreateSpaceController@Preview4');
    Route::post('/create-space/get-states','CreateSpaceController@GetStates');
    Route::post('/create-space/get-cities','CreateSpaceController@GetCities');
    Route::post('/create-space/save-service-day','CreateSpaceController@SaveServiceDay');
    Route::put('/create-space/update-service-day','CreateSpaceController@UpdateServiceDay');
    Route::get('/create-space/get-service-day','CreateSpaceController@GetServiceDay');
//}

// Routes for the service creation{
    Route::get('/create-service/category','CreateServiceController@Category');
    Route::post('/create-service/save-category','CreateServiceController@SaveCategory');
    Route::get('/create-service/hosting','CreateServiceController@Hosting');
    Route::post('/create-service/save-hosting','CreateServiceController@SaveHosting');
    Route::get('/create-service/basics','CreateServiceController@Basics');
    Route::post('/create-service/save-basics','CreateServiceController@SaveBasics');
    Route::get('/create-service/photos','CreateServiceController@Photos');
    Route::post('/create-service/save-photos','CreateServiceController@SavePhotos');
    Route::get('/create-service/location','CreateServiceController@Location');
    Route::post('/create-service/save-location','CreateServiceController@SaveLocation');
    Route::get('/create-service/notes','CreateServiceController@Notes');
    Route::post('/create-service/save-notes','CreateServiceController@SaveNotes');
    Route::get('/create-service/co-host','CreateServiceController@CoHost');
    Route::get('/create-service/preview-overview','CreateServiceController@Preview1');
    Route::get('/create-service/preview-reviews','CreateServiceController@Preview2');
    Route::get('/create-service/preview-host','CreateServiceController@Preview3');
    Route::get('/create-service/preview-location','CreateServiceController@Preview4');
    Route::post('/create-service/get-states','CreateServiceController@GetStates');
    Route::post('/create-service/get-cities','CreateServiceController@GetCities');
    Route::post('/create-service/save-service-day','CreateServiceController@SaveServiceDay');
    Route::put('/create-service/update-service-day','CreateServiceController@UpdateServiceDay');
    Route::get('/create-service/get-service-day','CreateServiceController@GetServiceDay');
//}

// Routes for the parking creation{
    Route::get('/create-parking/place-type','CreateParkingController@First');
    Route::post('/create-parking/save-first','CreateParkingController@SaveFirst');

    Route::get('/create-parking/bedrooms','CreateParkingController@Second1');
    Route::post('/create-parking/add-bedrooms','CreateParkingController@AddBedrooms');
    Route::get('/create-parking/bedrooms/edit-bedrooms','CreateParkingController@Second2');
    Route::post('/create-parking/bedrooms/edit-bedrooms/add-bed','CreateParkingController@Second3');
    Route::post('/create-parking/bedrooms/edit-bedrooms/save-beds','CreateParkingController@SaveBeds');

    Route::get('/create-parking/baths','CreateParkingController@Third');
    Route::post('/create-parking/save-third','CreateParkingController@SaveThird');

    Route::get('/create-parking/location','CreateParkingController@Fourth');
    Route::post('/create-parking/save-fourth','CreateParkingController@SaveFourth');

    Route::get('/create-parking/amenities','CreateParkingController@Fifth');
    Route::post('/create-parking/save-fifth','CreateParkingController@SaveFifth');

    Route::get('/create-parking/hosting','CreateParkingController@Sixth');
    Route::post('/create-parking/save-sixth','CreateParkingController@SaveSixth');

    Route::get('/create-parking/basics','CreateParkingController@Seventh');
    Route::post('/create-parking/save-seventh','CreateParkingController@SaveSeventh');

    Route::get('/create-parking/listing','CreateParkingController@Eigth');
    Route::post('/create-parking/save-eight','CreateParkingController@SaveEigth');

    Route::get('/create-parking/photos','CreateParkingController@Ninth');
    Route::post('/create-parking/save-ninth','CreateParkingController@SaveNinth');

    Route::get('/create-parking/services','CreateParkingController@Tenth');
    Route::post('/create-parking/save-tenth','CreateParkingController@SaveTenth');

    Route::get('/create-parking/notes','CreateParkingController@Eleven');
    Route::post('/create-parking/save-eleven','CreateParkingController@SaveEleven');

    Route::get('/create-parking/co-host','CreateParkingController@Twelve');
    Route::post('/create-parking/save-twelve','CreateParkingController@SaveTwelve');

    Route::get('/create-parking/preview-overview','CreateParkingController@Preview1');
    Route::get('/create-parking/preview-reviews','CreateParkingController@Preview2');
    Route::get('/create-parking/preview-host','CreateParkingController@Preview3');
    Route::get('/create-parking/preview-location','CreateParkingController@Preview4');
    
    Route::post('/create-parking/splet','CreateParkingController@storeTemporary');
    Route::post('/create-parking/get-states','CreateParkingController@GetStates');
    Route::post('/create-parking/get-cities','CreateParkingController@GetCities');
    Route::post('/create-parking/save-service-day','CreateParkingController@SaveServiceDay');
    Route::put('/create-parking/update-service-day','CreateParkingController@UpdateServiceDay');
    Route::get('/create-parking/get-service-day','CreateParkingController@GetServiceDay');
//}
//}

// Routes for the Workspace creation{
    Route::get('/create-workspace/place-type','CreateWorkspaceController@First');
    Route::post('/create-workspace/save-first','CreateWorkspaceController@SaveFirst');

    Route::get('/create-workspace/bedrooms','CreateWorkspaceController@Second1');
    Route::post('/create-workspace/add-bedrooms','CreateWorkspaceController@AddBedrooms');
    Route::get('/create-workspace/bedrooms/edit-bedrooms','CreateWorkspaceController@Second2');
    Route::post('/create-workspace/bedrooms/edit-bedrooms/add-bed','CreateWorkspaceController@Second3');
    Route::post('/create-workspace/bedrooms/edit-bedrooms/save-beds','CreateWorkspaceController@SaveBeds');

    Route::get('/create-workspace/baths','CreateWorkspaceController@Third');
    Route::post('/create-workspace/save-third','CreateWorkspaceController@SaveThird');

    Route::get('/create-workspace/location','CreateWorkspaceController@Fourth');
    Route::post('/create-workspace/save-fourth','CreateWorkspaceController@SaveFourth');


    Route::get('/create-workspace/amenities','CreateWorkspaceController@Fifth');
    Route::post('/create-workspace/save-amenities','CreateWorkspaceController@SaveFifth');

    Route::get('/create-workspace/hosting','CreateWorkspaceController@Sixth');
    Route::post('/create-workspace/save-hosting','CreateWorkspaceController@SaveSixth');

    Route::get('/create-workspace/basics','CreateWorkspaceController@Seventh');
    Route::post('/create-workspace/save-basics','CreateWorkspaceController@SaveSeventh');

    Route::get('/create-workspace/listing','CreateWorkspaceController@Eigth');
    Route::post('/create-workspace/save-listing','CreateWorkspaceController@SaveEigth');

    Route::get('/create-workspace/photos','CreateWorkspaceController@Ninth');
    Route::post('/create-workspace/save-photos','CreateWorkspaceController@SaveNinth');

    Route::get('/create-workspace/services','CreateWorkspaceController@Tenth');
    Route::post('/create-workspace/save-services','CreateWorkspaceController@SaveTenth');

    Route::get('/create-workspace/notes','CreateWorkspaceController@Eleven');
    Route::post('/create-workspace/save-notes','CreateWorkspaceController@SaveEleven');
    Route::get('/create-workspace/notes/emergency-number','CreateWorkspaceController@ElevenEmergency');
    Route::post('/create-workspace/notes/emergency-number','CreateWorkspaceController@ElevenEmergecyAdd');

    Route::get('/create-workspace/co-host','CreateWorkspaceController@Twelve');
    
    Route::get('/create-workspace/preview-overview','CreateWorkspaceController@Preview1');
    Route::get('/create-workspace/preview-reviews','CreateWorkspaceController@Preview2');
    Route::get('/create-workspace/preview-host','CreateWorkspaceController@Preview3');
    Route::get('/create-workspace/preview-location','CreateWorkspaceController@Preview4');
    Route::post('/create-workspace/splet','CreateWorkspaceController@storeTemporary');
    Route::post('/create-workspace/get-states','CreateWorkspaceController@GetStates');
    Route::post('/create-workspace/get-cities','CreateWorkspaceController@GetCities');
    Route::post('/create-workspace/save-service-day','CreateWorkspaceController@SaveServiceDay');
    Route::put('/create-workspace/update-service-day','CreateWorkspaceController@UpdateServiceDay');
    Route::get('/create-workspace/get-service-day','CreateWorkspaceController@GetServiceDay');
//}

//Special Date
    Route::post('/service/add-specialdate','CreateSpaceController@SaveSpecialDate');
//Social Login{
//Route::get('social/{provider?}', 'SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback');
// New social Login
Route::get('/social/{action}/{provider}', 'SocialController@getSocialAuth');
//}
