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
  $n=stdin_to_intval();
  for($i=0;$i<$n;++$i){
    $grid[]=stdin_to_intvals();
  }
  return array($grid);
}

function iter_randomly_filled_grid($grid) {
  foreach ($grid as $r => $row) {
    foreach ($row as $c => $num) {
      if ($num==0){
      $zero_addresses[]=array($r,$c);
      }
    }
  }
  // var_dump($zero_addresses);
  for ($i=0; $i < count($grid)*count($grid); $i++) {
    $grid[$zero_addresses[0][0]][$zero_addresses[0][1]]=$i+1;
    for ($j=0; $j < count($grid)*count($grid); $j++) {
      $grid[$zero_addresses[1][0]][$zero_addresses[1][1]]=$j+1;
      yield $grid;
    }
  }
}
function is_valid($grid)
{
  $n=count($grid);
  for ($i=0; $i < $n; $i++) {
      $row=$grid[$i];
      $sums[]=array_sum($row);
  }
  for ($c=0; $c < $n; $c++) {
    $nums=array();
    for ($r=0; $r < $n; $r++) {
      $nums[]=$grid[$r][$c];
    }
    $sums[]=array_sum($nums);
  }
  $nums=array();
  for ($i=0; $i < $n ; $i++) {
    $nums[]=$grid[$i][$i];
  }
  $sums[]=array_sum($nums);
  // $nums=array();
  // for ($i=0; $i < $n ; $i++) {
  //   $nums[]=$grid[$n-$i-1][$i];
  // }
  // $sums[]=array_sum($nums);
  // var_dump($sums);
  if (min($sums)!=max($sums)) {
    return false;
  } else {
    return true;

  }
}
function echo_grid($grid)
{
  foreach ($grid as $row) {
    echo implode(" ", $row)."\n";
  }
}

function solve($grid)
{
  foreach (iter_randomly_filled_grid($grid) as $randomly_filled_grid) {
    // var_dump($randomly_filled_grid);
    if (is_valid($randomly_filled_grid)) {
      echo_grid($randomly_filled_grid);
      return;
    }
  }
}
function main()
{
  solve(...stdin_handler());
}


main();

?>
