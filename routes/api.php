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

Route::get('/path','PathController@index');

Route::get('/store_path','PathController@store');

Route::get('/paths/{id}','PathController@show');

Route::get('/paths','PathController@index');
