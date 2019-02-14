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
  list($home_to_paiza,$paiza_to_gino,$gino_to_corp)=stdin_to_intvals();
  $n=stdin_to_intval();
  for ($i=0; $i < $n; $i++) {
    list($hour,$min)=stdin_to_intvals();
    $times[]=$hour*60+$min;
  }
  return array($home_to_paiza,$paiza_to_gino,$gino_to_corp,$times);
}


function solve($home_to_paiza,$paiza_to_gino,$gino_to_corp,$times)
{
  $arrive=8*60+59;
  foreach ($times as $time) {
    // echo $arrive."/".($time+$paiza_to_gino+$gino_to_corp)."\n";
    if ($arrive>$time+$paiza_to_gino+$gino_to_corp){

      $hour = floor($time/60);
      $min = $time % 60;
      // echo $hour.":".$min."\n";
      $min_train_time=$time;
      // break;
    }
  }
  $min_train_time = $min_train_time - $home_to_paiza;
  $hour = floor($min_train_time/60);
  $min = $min_train_time % 60;
  echo str_pad($hour, 2, 0, STR_PAD_LEFT).":".str_pad($min, 2, 0, STR_PAD_LEFT);

}
function main()
{
  solve(...stdin_handler());
}

main();

?>
