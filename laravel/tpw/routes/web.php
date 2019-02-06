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
    echo 'hello!';
    // return view('welcome');
});
Route::get('/hello', function () {
    return view('hello');
});

Route::get('/controller','helloController@index');
Route::get('/secondhello','secondhelloController@index');

Route::get('/dynamichello','dynamichelloController@index');
Route::get('dynmicpath-handler/{message}', function($message)
{
    return 'path is' . $message;
});
