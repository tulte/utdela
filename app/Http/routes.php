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

Route::get('/',function() {
    return view('start');
});


// Authentication routes...
Route::get('login', ['as' => 'login.index', 'uses' => 'LoginController@index']);
Route::post('login', 'LoginController@login');
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);


Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('user',['as' => 'user.index', 'uses'=>'UserController@index']);
    Route::get('user/edit/{id}',['as' => 'user.edit', 'uses'=>'UserController@edit']);
    Route::get('user/destroy/{id}',['as' => 'user.destroy', 'uses'=>'UserController@destroy']);
    Route::get('user/create',['as' => 'user.create', 'uses'=>'UserController@create']);
    Route::post('user/save',['as' => 'user.save', 'uses'=>'UserController@save']);
    Route::post('user/update/{id}',['as' => 'user.update', 'uses'=>'UserController@update']);

    Route::get('upload',['as' => 'upload.index', 'uses'=>'UploadController@index']);
    Route::post('upload',['as' => 'upload.upload', 'uses'=>'UploadController@upload']);
});


Route::group(['middleware'=>'auth:reader'],function(){
    Route::get('user/files/{id}',['as' => 'user.files', 'uses'=>'UserController@files']);
    Route::get('user/download/{id}',['as' => 'user.download', 'uses'=>'UserController@download']);
});
