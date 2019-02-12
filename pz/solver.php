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
  $repeat_num=stdin_to_intval();
  $boxsize=stdin_to_intval();
  for($i=0;$i<$boxsize;++$i){
    $rows[]=trim(fgets(STDIN));
  }
  return array($repeat_num,$rows);
}

function multiply_rows($rows)
{
  $n=count($rows);
  $new_rows=array();
  for ($r=0; $r < $n*$n; $r++) {
    $new_row=array();
    $origin_r=$r % $n;
    for ($c=0; $c < $n*$n; $c++) {
      $origin_c=$c % $n;
      if (str_split($rows[$origin_r])[$origin_c]=="#" && str_split($rows[floor($r/$n)])[floor($c/$n)]=="#"){
        $new_row[]="#";
      } else {
        $new_row[]=".";
      }
    }
    $new_row_str = implode("",$new_row);
    $new_rows[]=$new_row_str;
  }
  return $new_rows;
}

function solve($repeat_num,$rows)
{
  for ($i=0; $i < $repeat_num; $i++) {
    $rows=multiply_rows($rows);
  }
  foreach ($rows as $row) {
    echo $row."\n";
  }
}
function main()
{
  solve(...stdin_handler());
}


main();

?>
