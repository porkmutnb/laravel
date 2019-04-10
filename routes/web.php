<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', 'AccountController@index');
Route::post('login', 'AccountController@login');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index');

    Route::get('profile', 'SettingController@show');
    Route::post('edit/profile', 'SettingController@update');
    Route::get('setting', 'SettingController@setting');
    Route::get('log', 'SettingController@log');

    //manage Display
    Route::get('facilities', 'ManageDisplayController@facilities');
    Route::get('facilities/{type}', 'ManageDisplayController@formFacilities');
    Route::post('facilities/{type}', 'ManageDisplayController@manageFacilities');
    Route::get('bank', 'ManageDisplayController@bank');
    Route::get('bank/{type}', 'ManageDisplayController@formBank');
    Route::post('bank/{type}', 'ManageDisplayController@manageBank');
    Route::get('gender', 'ManageDisplayController@gender');
    Route::get('gender/{type}', 'ManageDisplayController@formGender');
    Route::post('gender/{type}', 'ManageDisplayController@manageGender');
    Route::get('nearby', 'ManageDisplayController@nearby');
    Route::get('nearby/{type}', 'ManageDisplayController@formNearby');
    Route::get('nearby/{type}/{method}', 'ManageDisplayController@formNearbyMethod');
    Route::post('nearby/{type}/{method}', 'ManageDisplayController@manageNearbyMethod');

    //member Display
    Route::get('member', 'MemberController@index');

    //dormitory Display
    Route::get('dormitory', 'DormitoryController@index');

    //bookking Display
    Route::get('booking', 'BookingController@index');

    Route::get('logout', 'AccountController@logout');
});

Route::prefix('api/')->group(function () {
    Route::post('login', 'AccountController@apiLogin');
    Route::post('register', 'AccountController@apiRegister');

    Route::middleware(['check'])->group(function () {
        Route::post('profile', 'MemberController@apiProfile');
    });
});