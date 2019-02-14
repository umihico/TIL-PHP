<?php

function stdin_to_intval() {
    return intval(trim(fgets(STDIN)));
    // echo stdin_to_intval();
}

function stdin_to_intvals() {
    $split_input=explode(' ',trim(fgets(STDIN)));
    foreach ($split_input as $val) {
        $vals[]=intval($val);
        // code...
    }
    return $vals;
    // list($a, $b, $c)=stdin_to_intvals();
}
function stdin_handler()
{
  list($y_size,$x_size,$country_num)=stdin_to_intvals();
  for ($i=0; $i < $country_num; $i++) {
    list($name,$x,$y)=str_split(trim(fgets(STDIN)));
    $countries[$name]=array($x,$y);
  }
  return array($country_num,$y_size,$x_size,$countries);
}

function iter_around_cells($y_size,$x_size,$r,$c)
{
  $around_pos=array(array(1,0),array(-1,0),array(0,-1),array(0,1));
  foreach ($around_pos as $value) {
    $y=$r+$value[0];
    $x=$c+$value[1];
    if ($y>=0 && $y<$y_size && $x>=0 && $x<$x_size){
      yield array($y,$x);
    }
  }
}

function solve($country_num,$y_size,$x_size,$countries)
{
  for ($i=0; $i < $y_size; $i++) {
    $grid[]=array_fill(0,$x_size,0);
  }
  foreach ($countries as $name => list($x,$y)) {
    $grid[$y][$x]=$name;
  }
  while (true) {
    $new_grid=array();
    $changed=false;
    for ($r=0; $r < $y_size; $r++) {
      $row=array();
      for ($c=0; $c < $x_size; $c++) {
        $current_color=$grid[$r][$c];
        if ($current_color==0) {
          $around_colors=array();
          foreach (iter_around_cells($y_size,$x_size,$r,$c) as list($ar,$ac)) {
            $around_color=$grid[$ar][$ac];
            $around_colors[]=$around_color;
          }
          if (count($around_colors)==1) {
            $new_grid[$r][$c]=$around_colors;
            $changed=true;
          }
          if (count($around_colors)>1) {
            $new_grid[$r][$c]="?";
            $changed=true;
          }
        }
      }
    }
    foreach ($new_grid as $r => $row) {
      foreach ($row as $c => $new_color) {
        $grid[$r][$c]=$new_color;
      }
    }
    if (!$changed){
      break;
    }
    for ($r=0; $r < $y_size; $r++) {
      echo implode("",$grid[$r])."\n";
    }
  }
  for ($r=0; $r < $y_size; $r++) {
    echo implode("",$grid[$r])."\n";
  }

}
function main()
{
  solve(...stdin_handler());
}

main();

?>
