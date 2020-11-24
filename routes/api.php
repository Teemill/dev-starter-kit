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

Route::get('api-test', function () {
    return response('Hello from the API');
});

Route::get('images/asc', "ImagesController@asc");

Route::get('images/desc', "ImagesController@desc");

Route::get('images/random', "ImagesController@random");

Route::get('animals/list', "AnimalController@alphabetical");

Route::get('animals/get/{animal_id}', "AnimalController@retrieve");