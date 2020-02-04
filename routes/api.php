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

Route::post('register', 'ApiController@register')->name('api.register');
Route::post('login', 'ApiController@login')->name('api.login');

Route::middleware('auth:api')->group(function () {
    Route::get('/profile', 'ApiController@profile')->name('api.profile');
    Route::get('/people', 'ApiController@getPeople')->name('api.people');
    Route::get('/ship_orders', 'ApiController@getShipOrders')->name('api.ship_orders');
});