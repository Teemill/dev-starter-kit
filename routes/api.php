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

// image api routes
Route::get('images/asc', "ImageController@asc");
Route::get('images/desc', "ImageController@desc");
Route::get('images/random', "ImageController@random");

// animal api routes
Route::get('animals/list', "AnimalController@alphabetical");
Route::get('animals/get/{animal_id}', "AnimalController@retrieve");

// car api routes
Route::get('cars/list', "CarController@index");
Route::get("cars/count/{property}", "CarController@countOn");
Route::get('cars/get/{id}', "CarController@retrieve");
Route::post("cars/add", "CarController@store")->middleware("check_password");

Route::get('manufacturers/list', "ManufacturerController@index");
Route::get("manufacturers/data", "ManufacturerController@data");
Route::get('fuel_types/list', "FuelTypeController@index");
Route::get("fuel_types/data", "FuelTypeController@data");