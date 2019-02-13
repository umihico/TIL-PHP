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
  $n=stdin_to_intval();
  for ($i=0; $i <$n ; $i++) {
    $words[]=trim(fgets(STDIN));
  }
  return array($words);
}
function startsWith($word, $letters) {
    return (strpos($word, $letters) === 0);
}
function endsWith($word, $letters) {
    return (strlen($word) > strlen($letters)) ? (substr($word, -strlen($letters)) == $letters) : false;
}
function edit($word)
{
    $es_words=array("s", "sh", 'ch', 'o', 'x');
    foreach ($es_words as $es_word) {
      if (endsWith($word, $es_word)){
        return $word."es";
      }
    }
    $ves_words=array( 'f', 'fe' );
    foreach ($ves_words as $ves_word) {
      if (endsWith($word, $ves_word)){
        return substr($word, 0, -strlen($ves_word))."ves";
      }
    }
    $vowy_words=array('ay','iy','uy','ey','oy');
    if (endsWith($word, "y")){
      $ends_without_vow_sounds=false;
      foreach ($vowy_words as $vowy_word) {
        if (endsWith($word, $vowy_word)){
          $ends_without_vow_sounds=true;
        }
      }
      if (! $ends_without_vow_sounds){
        return substr($word, 0, -1)."ies";
      }
    }
    return $word.'s';
}

function solve($words)
{
  foreach ($words as $word) {
    echo edit($word)."\n";
  }
}
function main()
{
  solve(...stdin_handler());
}

main();

?>
