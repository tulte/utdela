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


// Authentication routes...
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);


Route::get('/',['middleware' => 'auth','uses' => 'UploadController@index']);
Route::get('upload',['middleware' => 'auth','uses' => 'UploadController@index']);
