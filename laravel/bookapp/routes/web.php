<?php

use App\Book;
use Illuminate\Http\Request;
/*
|-----------git add ---------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    echo "hello routing-get";
    // return view('book');
});


Route::post('/book', function (Request $request) {
    //
});
Route::post('/book/{book}', function (Book $book) {
    //
});
