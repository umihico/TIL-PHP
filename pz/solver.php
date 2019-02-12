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
  list($H, $W, $player_num)=stdin_to_intvals();
  for($i=0;$i<$H;++$i){
    $cards[]=stdin_to_intvals();
  }
  $pick_history_num=stdin_to_intval();
  for($i=0;$i<$pick_history_num;++$i){
    $pick_history[]=stdin_to_intvals();
  }
  return array($H, $W, $player_num,$cards,$pick_history);
}

function is_same($picked_card_info,$cards)
{
  list($ay,$ax,$by,$bx)=$picked_card_info;
  // var_dump( array($cards[$ay-1][$ax-1],$cards[$by-1][$bx-1]));
  if ($cards[$ay-1][$ax-1]==$cards[$by-1][$bx-1]){
    // echo "true";
    return true;
  } else {
    // echo "false";
    return false;
  }

}

function solve($H, $W, $player_num,$cards,$pick_history)
{
  $player_scores=array_fill(0,$player_num,0);
  $current_player_id=0;
  foreach ($pick_history as $picked_card_info) {
    if (is_same($picked_card_info,$cards)){
      $player_scores[$current_player_id]++;
    } else {
      $current_player_id++;
      if ($current_player_id==$player_num) {
        $current_player_id=0;
      }
    }
  }
  foreach ($player_scores as $player_score) {
    echo 2*$player_score."\n";
  }
}
function main()
{
  solve(...stdin_handler());
}


main();

?>
