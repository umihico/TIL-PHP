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
  list($repeat_num,$map)=explode(' ',trim(fgets(STDIN)));
  $map=str_split($map);
  $word=trim(fgets(STDIN));



  return array($repeat_num,$map,$word);
}


function solve($repeat_num,$map,$word)
{
  $base_alphas = range('a', 'z');
  foreach ($map as $i=>$letter) {
    $new_map[$letter]=$base_alphas[$i];
  }
  $new_map[" "]=" ";
  for ($i=0; $i < $repeat_num; $i++) {
    $split_word=str_split($word);
    $new_word=array();
    foreach ($split_word as $letter) {
      $new_letter=$new_map[$letter];
      $new_word[]=$new_letter;
    }
    $word=implode("",$new_word);
    // code...
  }
  echo $word;

}
function main()
{
  solve(...stdin_handler());
}

main();

?>
