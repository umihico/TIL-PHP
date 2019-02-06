<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dynamichelloController extends Controller
{
  public function index(){
    return view("dynamichello",['val' => date('c')]);
}
}
