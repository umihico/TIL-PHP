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
  list($a1,$b1)=stdin_to_intvals();
  list($a2,$b2)=stdin_to_intvals();



  return array($y_size,$x_size,$a1,$b1,$a2,$b2);
}


function solve($y_size,$x_size,$a1,$b1,$a2,$b2)
{
  $x_diff=$b1-$a1;
  $y_diff=$a2-$a1;
  $y_diff_adj=($a2-$a1)-($b2-$b1);
  for ($r=0; $r < $y_size; $r++) {
    $row=array();
    $x_diff_row=$x_diff-($y_diff_adj*$r);
    for ($c=0; $c < $x_size; $c++) {
      $row[]=$a1+($c*$x_diff_row)+($r*$y_diff);
    }
    echo implode(" ",$row)."\n";
  }

}
function main()
{
  solve(...stdin_handler());
}

main();

?>
