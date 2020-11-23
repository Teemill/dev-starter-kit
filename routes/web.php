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

// routes to return views for different image ordering
Route::get("images/asc", function() {
    return view("ascending");
});

Route::get("images/desc", function() {
    return view("descending");
});

Route::get("images/random", function() {
    return view("random");
});
