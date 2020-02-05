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

use Illuminate\Support\Facades\Route;

Route::get('/', 'ImportXMLFilesController@create')->name('xml.create');

Route::get('/xml/create', 'ImportXMLFilesController@create')->name('xml.create');

Route::post('/xml/store', 'ImportXMLFilesController@store')->name('xml.store');
