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
    Route::get('/fb',"\App\Http\Controllers\UserController@login_facebook");
    Route::get('/google',"\App\Http\Controllers\UserController@login_google");

});

Route::get('/',"\App\Http\Controllers\UserController@login");
Route::get('/sign-up',"\App\Http\Controllers\UserController@register");
