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
  list($y_size,$x_size)=stdin_to_intvals();
  for ($i=0; $i < $y_size; $i++) {
    $grid[]=str_split(trim(fgets(STDIN)));
    // code...
  }
  list($x_pos,$y_pos)=stdin_to_intvals();
  $x_pos--;
  $y_pos--;
  $move_num=stdin_to_intval();
  for ($i=0; $i < $move_num; $i++) {
    $directions[]=trim(fgets(STDIN));
  }
  return array($grid,$y_size,$x_size,$x_pos,$y_pos,$directions);
}


function solve($grid,$y_size,$x_size,$x_pos,$y_pos,$directions)
{
  $direction_dict=array(
    "U"=>array(-1,0),
    "D"=>array(1,0),
    "R"=>array(0,1),
    "L"=>array(0,-1)
  );
  foreach ($directions as $direction) {
    list($y_adj,$x_adj)=$direction_dict[$direction];
    $y_pos=$y_pos+$y_adj;
    $x_pos=$x_pos+$x_adj;
    while ($y_pos>=0 && $y_pos<$y_size && $x_pos>=0 && $x_pos<$x_size && $grid[$y_pos][$x_pos] == "#"):
      $y_pos=$y_pos+$y_adj;
      $x_pos=$x_pos+$x_adj;
    endwhile;
    while (!($y_pos>=0 && $y_pos<$y_size && $x_pos>=0 && $x_pos<$x_size)):
      $y_pos=$y_pos-$y_adj;
      $x_pos=$x_pos-$x_adj;
    endwhile;
  }
  echo $x_pos." ".$y_pos;
}
function main()
{
  solve(...stdin_handler());
}

main();

?>
