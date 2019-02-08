<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;



class pathController extends Controller
{
  public function exact_only_okay_portfolios(){
    $portfolios_okay_all = Portfolio::where("gif_success","1")->get();
    return $portfolios_okay_all;
  }
  public function main_view_wrapper($portfolios_all,$display_portfolios, $path, $page_num)
  {
    $geotags=$this->gen_geotags(30);
    $pagination_bar=$this->gen_pagination_bar($portfolios_all, $path, $page_num);
    foreach ($display_portfolios as $display_portfolio) {
      $skillset=json_decode(str_replace("'","\"",$display_portfolio['skills']));
      // echo $skillset;
      $display_portfolio['skills']=$skillset;
      $showcase=$display_portfolio;
      // var_dump($showcase);
      $showcases[]=$showcase;
    }
    return view("main",['path'=>$path,'showcases' => $showcases,'geotags'=>$geotags,'pagination_bar'=>$pagination_bar]);
  }

  public function gen_pagination_bar($portfolios_all, $path, $page_num)
  {
    $pnum=count($portfolios_all);
    $min_page_num=0;
    $max_page_num=ceil($pnum/12)-1;
    $pagebar_nums=array($page_num-2,$page_num-1,$page_num,$page_num+1,$page_num+2);
    $pagebar_nums = array_diff($pagebar_nums, array(-2,-1,$max_page_num+1,$max_page_num+2));
    $pagebar_nums = array_values($pagebar_nums);
    if ($pagebar_nums[0]!=0){
      $pagebar_nums_[]=0;
      if ($pagebar_nums[0]!=1){
        $pagebar_nums_[]="...";
      }
      foreach ($pagebar_nums as $pagebar_num) {
        $pagebar_nums_[]=$pagebar_num;
      }
      $pagebar_nums=$pagebar_nums_;
    }
    if (end($pagebar_nums)!=$max_page_num){
      if (end($pagebar_nums)!=$max_page_num-1){
        $pagebar_nums[]="...";
      }
      $pagebar_nums[]=$max_page_num;
    }
    return $pagebar_nums;
  }
  public function gen_geotags($num){
    $portfolios_all = $this->exact_only_okay_portfolios();
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
  public function pick_12portfolios($raw_portfolios, $sortkey, $page_num)
  {
    foreach ($raw_portfolios as $pf) {
      $portfolios[] = $pf;
    }
    foreach ((array) $portfolios as $key => $value) {
      $sort[$key] = $value[$sortkey];
    }
    array_multisort($sort, SORT_DESC, $portfolios);
    $page_num=intval($page_num)*12;
    $picked_array=array_slice($portfolios, $page_num, $page_num+12);
    return $picked_array;
  }
  public function most_stars($num)
  {

    $portfolios_all = $this->exact_only_okay_portfolios();
    $display_portfolios=$this->pick_12portfolios($portfolios_all,'stargazers_count', $num);
    return $this->main_view_wrapper($portfolios_all,$display_portfolios,"most_stars",$num);
  }
  public function most_forks($num)
  {
    $portfolios_all = $this->exact_only_okay_portfolios();
    $display_portfolios=$this->pick_12portfolios($portfolios_all, 'forks', $num);
    return $this->main_view_wrapper($portfolios_all,$display_portfolios,"most_forks",$num);
  }
  public function recently_update($num)
  {
    $portfolios_all = $this->exact_only_okay_portfolios();
    $display_portfolios=$this->pick_12portfolios($portfolios_all, 'pushed_at', $num);
    return $this->main_view_wrapper($portfolios_all,$display_portfolios,"recently_update",$num);
  }
  public function location($location,$num)
  {
    $portfolios_all = $this->exact_only_okay_portfolios();
    foreach ($portfolios_all as $pf) {
      $geotags=array(json_decode(str_replace("'","\"",$pf->geotags)))[0];
      if (in_array($location, $geotags)){
        $location_match_portfolios[] = $pf;
      }
    }
    $display_portfolios=$this->pick_12portfolios($location_match_portfolios, 'stargazers_count', $num);
    return $this->main_view_wrapper($location_match_portfolios, $display_portfolios,"location/".$location,$num);
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
