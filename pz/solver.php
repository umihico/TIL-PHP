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
  for ($i=0; $i < $n; $i++) {
    $words[]=trim(fgets(STDIN));
  }
  return array($words);
}

function combine($new_word,$adding_word)
{
  $new_list=str_split($new_word);
  $adding_list=str_split($adding_word);
  $return_word=$new_word.$adding_word;
  for ($i=0; $i < min(count($new_list),count($adding_list)); $i++) {
    // echo substr($new_word,-$i-1,$i+1).",".substr($adding_word,0,$i+1)."\n";
    if (substr($new_word,-$i-1,$i+1)==substr($adding_word,0,$i+1)){
      // echo "hit!\n";
      $return_word=substr($new_word,0,-$i-1).$adding_word;
    }
  }
  return $return_word;

}

function solve($words)
{
  $new_word=$words[0];
  for ($i=1; $i < count($words); $i++) {
    $new_word=combine($new_word,$words[$i]);
  }
  echo trim($new_word);
}
function main()
{
  solve(...stdin_handler());
}

main();

?>
