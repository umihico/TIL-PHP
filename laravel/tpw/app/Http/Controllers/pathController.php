<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pathController extends Controller
{
  public function index($path)
  {
    return view("path",['hoge' => $path]);
  }
}
