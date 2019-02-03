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
  $books=Book::all();
  return view('books',[
    'books'=>$books
  ]);
});


Route::post('/book', function (Request $request) {
    //
});
Route::post('/book/{book}', function (Book $book) {
    //
});
