<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
class pathController extends Controller
{
  public function index($path)
  {
    // $pfs = Portfolio::all();
    $pfs = Portfolio::where('username', 'umihico')->get();
    // return view('select')->with('members',$pfs);
    return view("path",['hoge' => $path, 'portfolios' => $pfs]);
  }
}
