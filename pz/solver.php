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
    // var_dump(stdin_to_intvals());
}
function stdin_handler()
{
  list($first_x, $first_y)=stdin_to_intvals();
  list($jump_power_front, $jump_power_right,$jump_power_back,$jump_power_left)=stdin_to_intvals();
  $n=stdin_to_intval();
  for($i=0;$i<$n;++$i){
    $orders[]=explode(' ',trim(fgets(STDIN)));
  }
  return array($first_x, $first_y, $jump_power_front, $jump_power_right,$jump_power_back,$jump_power_left,$orders);
}

function multiply_directions($direction,$order_direction)
{
  $direction_to_clock = array(
    "F" => 0,
    "R" => 3,
    "B" => 6,
    "L" => 9,
  );
  $clock_direction=($direction_to_clock[$direction]+$direction_to_clock[$order_direction])% 12;
  $moving_direction=array_flip($direction_to_clock)[$clock_direction];
  return $moving_direction;
}

function move($x,$y,$moving_direction,$jump_power)
{
  $direction_base_funcs = array(
    "F" => array(0,1),
    "R" => array(1,0),
    "B" => array(0,-1),
    "L" => array(-1,0)
  );
  $x_jump_power=$direction_base_funcs[$moving_direction][0] * $jump_power;
  $y_jump_power=$direction_base_funcs[$moving_direction][1] * $jump_power;
  return array($x_jump_power+$x,$y_jump_power+$y);
}
function solve($first_x, $first_y, $jump_power_front, $jump_power_right,$jump_power_back,$jump_power_left,$orders)
{
  $x=$first_x;
  $y=$first_y;
  $direction="F";
  $jump_powers = array(
    "F" => $jump_power_front,
    "R" => $jump_power_right,
    "B" => $jump_power_back,
    "L" => $jump_power_left
  );
  foreach ($orders as $order) {
    if ($order[0]=="m") {
      $moving_direction=multiply_directions($direction,$order[1]);
      $jump_power=$jump_powers[$order[1]];
      list($x,$y)=move($x,$y,$moving_direction,$jump_power);
    } else {
      $direction=multiply_directions($direction,$order[1]);
    }
  }
  echo $x." ".$y;
}
function main()
{
  solve(...stdin_handler());
}


main();

?>
