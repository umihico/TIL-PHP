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
  $answer=trim(fgets(STDIN));
  for($i=0;$i<$n;++$i){
    $keywords[]=trim(fgets(STDIN));
  }
  return array($answer,$keywords);
}

function echo_result($answer,$keyword) {
  if (preg_match("/".$answer."/", $keyword)){
    echo "valid\n";
    return;
  }
  for($i=0;$i<strlen($answer);++$i){
    list($front,$back)=explode(",",substr_replace($answer, ",", $i, 0));
    if (preg_match("/".$front."[a-z]{0,1}".$back."/", $keyword)){
      echo "valid\n";
      return;
    }
  }
  echo "invalid\n";
}

function solve($answer,$keywords)
{
  foreach ($keywords as $keyword) {
    echo_result($answer,$keyword);
  }
}
function main()
{
  solve(...stdin_handler());
}


main();

?>
