<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;



class pathController extends Controller
{
  public function pick_12portfolios($sortkey, $page_num)
  {
    $pfs = Portfolio::where('username', 'umihico')->get();
    return $pfs;
  }
  public function most_stars($path)
  {
    $display_portfolios=$this->pick_12portfolios('most_stars', $path);
    return view("path",['hoge' => $path, 'portfolios' => $display_portfolios]);
  }
  public function most_forks($path)
  {

    $display_portfolios=$this->pick_12portfolios('most_forks', $path);
    return view("path",['hoge' => $path, 'portfolios' => $display_portfolios]);
  }
  public function recently_update($path)
  {
    $display_portfolios=$this->pick_12portfolios('recently_update', $path);
    return view("path",['hoge' => $path, 'portfolios' => $display_portfolios]);
  }
  public function all_locations()
  {
    $pfs = Portfolio::all();
    return view("path",['hoge' => 'dummy', 'portfolios' => $pfs]);
  }
  public function all_users()
  {
    $pfs = Portfolio::all();
    return view("path",['hoge' => 'dummy', 'portfolios' => $pfs]);
  }
}
