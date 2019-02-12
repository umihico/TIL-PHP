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
public function stdin_handler()
{
  list($h, $w, $n)=stdin_to_intvals();
  for($i=0;$i<$h;++$i){
    fscanf(STDIN,"%d %d %d",$a,$b,$c);
  }
}


public function solve()
{
}
function main()
{
  solve(stdin_handler());
}


main();
?>
