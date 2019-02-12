<?php

function stdin_to_intval() {
    return intval(trim(fgets(STDIN)));
}

function stdin_to_intvals() {
    $split_input=explode(' ',trim(fgets(STDIN)));
    foreach ($split_input as $val) {
        $vals[]=intval($val);
        // code...
    }
    return $vals;
}
// echo stdin_to_intval();
// var_dump(stdin_to_intvals());

function solve()
{
}


solve();
?>
