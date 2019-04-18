<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('auth')->group(function () {
    Route::post('register', 'Auth\AuthController@register');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('refresh', 'Auth\AuthController@refresh');

    //reachable by logged users only
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'Auth\AuthController@user');
        Route::post('logout', 'Auth\AuthController@logout');
    });
});
