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
  $n_seconds=stdin_to_intval();
  list($y_size,$x_size)=stdin_to_intvals();
  for ($i=0; $i < $y_size; $i++) {
    $grid[]=str_split(trim(fgets(STDIN)));
    // code...
  }
  return array($grid,$n_seconds,$y_size,$x_size);
}


function solve($grid,$n_seconds,$y_size,$x_size)
{
  $direction_dict=array(
    3=>array(0,1),
    6=>array(1,0),
    9=>array(0,-1),
    0=>array(-1,0)
  );
  $turn_dict=array(
    3=>6,
    6=>9,
    9=>0,
    0=>3
  );
  $current_direction=3;
  $y_pos=0;
  $x_pos=0;
  $cleaned_pos[]=$y_pos.",".$x_pos;
  list($current_y_adj,$current_x_adj)=$direction_dict[$current_direction];
  $time=0;
  for ($i=0; $i < $n_seconds; $i++) {
    // echo $y_pos.",".$x_pos."\n";
    if ($grid[$y_pos][$x_pos]=='#'){
      $time++;
    }
    $y_pos=$y_pos+$current_y_adj;
    $x_pos=$x_pos+$current_x_adj;
    if (!($y_pos>=0 && $y_pos<$y_size && $x_pos>=0 && $x_pos<$x_size) || in_array($y_pos.",".$x_pos,$cleaned_pos)){
      $y_pos=$y_pos-$current_y_adj;
      $x_pos=$x_pos-$current_x_adj;
      $current_direction=$turn_dict[$current_direction];
      list($current_y_adj,$current_x_adj)=$direction_dict[$current_direction];
      $y_pos=$y_pos+$current_y_adj;
      $x_pos=$x_pos+$current_x_adj;
    }
    if (!($y_pos>=0 && $y_pos<$y_size && $x_pos>=0 && $x_pos<$x_size)){
      break;
    }
    $cleaned_pos[]=$y_pos.",".$x_pos;
  }
  echo $time;
}
function main()
{
  solve(...stdin_handler());
}

main();

?>
