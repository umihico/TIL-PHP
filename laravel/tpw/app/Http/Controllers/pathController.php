<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;



class pathController extends Controller
{
  public function main_view_wrapper($display_portfolios, $path, $page_num)
  {
    $geotags=$this->gen_geotags(30);
    return view("main",['portfolios' => $display_portfolios,'geotags'=>$geotags]);
  }

  public function gen_pagination_bar($sortkey, $page_num)
  {
    $portfolios_all = Portfolio::all();
    foreach ($portfolios_all as $pf) {
        $geotags=array(json_decode(str_replace("'","\"",$pf->geotags)))[0];
        $geotags_lsit[] = $geotags;
    }
    $portfolios_all=$portfolios_all2;
    return $this->pick_12portfolios($portfolios_all,$sortkey, $page_num);
    $results = array_map(
      function ($row) { return array_sum((array)$row); },
            $groups ? array_merge_recursive(...$groups) : []
    );

    var_dump($results);
  }
  public function gen_geotags($num){
    $portfolios_all = Portfolio::all();
    foreach ($portfolios_all as $pf) {
        $geotags=array(json_decode(str_replace("'","\"",$pf->geotags)))[0];
        $geotags_list[] = $geotags;
    }
    foreach($geotags_list as $geotags){
      foreach($geotags as $tag){
        if( isset( $result[ $tag ] ) ){
          $result[ $tag ] += 1;
          }else{
          $result[ $tag ] = 1;
        }
      }
    }
    arsort($result);
    $sliced_sorted_geotags=array_slice($result,0,$num);
    // var_dump($sliced_sorted_geotags);
    return $sliced_sorted_geotags;
  }
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
  public function most_stars($num)
  {
    $display_portfolios=$this->pick_12portfolios_from_all('stargazers_count', $num);
    return $this->main_view_wrapper($display_portfolios,"most_stars",$num);
  }
  public function most_forks($num)
  {
    $display_portfolios=$this->pick_12portfolios_from_all('forks', $num);
    return $this->main_view_wrapper($display_portfolios,"most_forks",$num);
  }
  public function recently_update($num)
  {
    $display_portfolios=$this->pick_12portfolios_from_all('pushed_at', $num);
    return $this->main_view_wrapper($display_portfolios,"recently_update",$num);
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
    return $this->main_view_wrapper($display_portfolios,"most_stars",$num);
  }
  public function all_locations()
  {
    $pfs = Portfolio::all();
    return view("main",['portfolios' => $pfs]);
  }
  public function all_users()
  {
    $pfs = Portfolio::all();
    return view("main",['portfolios' => $pfs]);
  }
}
