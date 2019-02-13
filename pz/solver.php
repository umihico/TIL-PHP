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
  list($field_num,$rabit_num,$repeat_num)=stdin_to_intvals();
  for ($i=0; $i <$rabit_num ; $i++) {
    $rabbit_ads[]=stdin_to_intval()-1;
  }
  return array($field_num,$rabit_num,$repeat_num,$rabbit_ads);
}

function jump($field_num,$rabit_num,$rabbit_ads)
{
  for ($rabit_id=0; $rabit_id < $rabit_num; $rabit_id++) {
    $rabit_pos=$rabbit_ads[$rabit_id];
    $jumped=false;
    for ($next_pos=$rabit_pos; $next_pos < $field_num; $next_pos++) {
      // echo $rabit_id.",".$next_pos."\n";
      if (! array_key_exists($next_pos,array_flip($rabbit_ads))) {
        $rabbit_ads[$rabit_id]=$next_pos;
        $jumped=true;
        break;
      }
    }
    if (! $jumped){
      for ($next_pos=0; $next_pos < $rabit_pos; $next_pos++) {
        // echo $rabit_id.",".$next_pos."\n";
        if (! array_key_exists($next_pos,array_flip($rabbit_ads))) {
          $rabbit_ads[$rabit_id]=$next_pos;
          break;
        }
      }
    }
    // break;
  }
  return $rabbit_ads;
}

function solve($field_num,$rabit_num,$repeat_num,$rabbit_ads)
{
  for ($i=0; $i < $repeat_num; $i++) {
    $rabbit_ads=jump($field_num,$rabit_num,$rabbit_ads);
    // break;
  }
  foreach ($rabbit_ads as $rabbit_ad) {
    echo ($rabbit_ad+1)."\n";
  }
}
function main()
{
  solve(...stdin_handler());
}

main();

?>
