<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;



class pathController extends Controller
{
  public function pick_12portfolios_from_all($sortkey, $page_num)
  {
    $portfolios_all = Portfolio::all();
    foreach ($portfolios_all as $pf) {
        $portfolios_all2[] = $pf;
    }
    $portfolios_all=$portfolios_all2;
    return $this->pick_12portfolios($portfolios_all,$sortkey, $page_num);
  }
  public function pick_12portfolios($portfolios, $sortkey, $page_num)
  {
    foreach ((array) $portfolios as $key => $value) {
      $sort[$key] = $value[$sortkey];
    }
    array_multisort($sort, SORT_DESC, $portfolios);
    $page_num=intval($page_num)*12;
    $picked_array=array_slice($portfolios, $page_num, $page_num+12);
    // $pfs = Portfolio::where('username', 'umihico')->get();
    return $picked_array;
  }
  public function most_stars($path)
  {
    $display_portfolios=$this->pick_12portfolios_from_all('stargazers_count', $path);
    return view("path",['portfolios' => $display_portfolios]);
  }
  public function most_forks($path)
  {
    $display_portfolios=$this->pick_12portfolios_from_all('forks', $path);
    return view("path",['portfolios' => $display_portfolios]);
  }
  public function recently_update($path)
  {
    $display_portfolios=$this->pick_12portfolios_from_all('pushed_at', $path);
    return view("path",['portfolios' => $display_portfolios]);
  }
  public function location($location,$num)
  {
    $pfs = Portfolio::all();
    foreach ($pfs as $pf) {
      $geotags=array(json_decode(str_replace("'","\"",$pf->geotags)))[0];
      if (in_array($location, $geotags)){
        $location_match_portfolios[] = $pf;
      }
    }
    $display_portfolios=$this->pick_12portfolios($location_match_portfolios, 'stargazers_count', $num);
    return view("path",['portfolios' => $display_portfolios]);
  }
  public function all_locations()
  {
    $pfs = Portfolio::all();
    return view("path",['portfolios' => $pfs]);
  }
  public function all_users()
  {
    $pfs = Portfolio::all();
    return view("path",['portfolios' => $pfs]);
  }
}
