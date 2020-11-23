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

Route::get('/', function () {
    return view('welcome');
});

Route
    ::name('mission')
    ->get('/mission', function () {
        return view('mission');
    });

// routes to return image URLs
Route::get("images/asc", "ImagesController@asc");

Route::get("images/desc", "ImagesController@desc");

Route::get("images/random", "ImagesController@random");
