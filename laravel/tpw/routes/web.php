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
    return redirect('/most_stars/0');
    // return view('welcome');
});
Route::get('/most_stars/{num}','pathController@most_stars');
Route::get('/most_forks/{num}','pathController@most_forks');
Route::get('/recently_update/{num}','pathController@recently_update');
Route::get('/location/{location}/{num}','pathController@location');
Route::get('/all_locations','pathController@all_locations');
Route::get('/all_users','pathController@all_users');
