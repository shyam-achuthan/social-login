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


Route::group(['prefix'=>'login'],function(){

    Route::get('/',"\App\Http\Controllers\UserController@login");
    Route::post('/',"\App\Http\Controllers\UserController@login_post");

    Route::get('/fb',"\App\Http\Controllers\UserController@login_facebook");
    Route::get('/fb/callback',"\App\Http\Controllers\UserController@login_facebook_callback");
    Route::get('/google',"\App\Http\Controllers\UserController@login_google");
    Route::get('/google/callback',"\App\Http\Controllers\UserController@login_google_callback");

});


Route::group(['middleware'=>'auth.member'],function(){

    Route::get('/dashboard',"\App\Http\Controllers\UserController@dashboard");

});




Route::get('/',"\App\Http\Controllers\UserController@login");
Route::get('/logout',"\App\Http\Controllers\UserController@logout");

Route::get('/sign-up',"\App\Http\Controllers\UserController@register");
Route::post('/sign-up',"\App\Http\Controllers\UserController@register_post");
