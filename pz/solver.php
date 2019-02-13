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
  list($n,$meter)=stdin_to_intvals();
  for ($i=0; $i <$n ; $i++) {
    $taxies[]=stdin_to_intvals();
  }
  return array($meter,$taxies);
}

function calc_fare($meter,$taxi)
{
  list($first_dis,$first_fare,$per_dis,$per_fare)=$taxi;
  if ($meter<$first_dis){
    return $first_fare;
  }
  $rest_meter=$meter-$first_dis;
  return $first_fare+((floor($rest_meter/$per_dis)+1)*$per_fare);
}
function solve($meter,$taxies)
{
  foreach ($taxies as $taxi) {
    $fares[]=calc_fare($meter,$taxi);
  }
  echo min($fares)." ".max($fares);
}
function main()
{
  solve(...stdin_handler());
}

main();

?>
