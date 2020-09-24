<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('/users', 'UserController');
Route::get('/admin', 'HomeController@settings');
Route::resource('/children', 'ChildController');
Route::post('/children/{child}', 'ChildController@update');
Route::post('/pictures', 'ChildController@picture');
Route::get('/guardians', 'HomeController@guardians');
Route::resource('/visitors', 'VisitorController');
Route::get('/activities', 'HomeController@activity');
Route::get('/homes', 'HomeController@homes');
Route::get('/help', 'HomeController@support');
Route::post('/help', 'HomeController@sendMessage');
