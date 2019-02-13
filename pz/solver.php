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
  $col_num=stdin_to_intval();
  $columns=explode(" ",trim(fgets(STDIN)));
  $row_num=stdin_to_intval();
  for ($i=0; $i < $row_num; $i++) {
    $rows[]=explode(" ",trim(fgets(STDIN)));
  }
  return array($col_num,$columns,$row_num,$rows);
}


function solve($col_num,$columns,$row_num,$rows)
{
  for ($c=0; $c < $col_num; $c++) {
    $len_nums=array();
    $len_nums[]=strlen($columns[$c]);
    foreach ($rows as $row) {
      $len_nums[]=strlen($row[$c]);
    }
    $col_max_len=max($len_nums);
    $columns[$c]=" ".$columns[$c].str_repeat(" ",$col_max_len-strlen($columns[$c]))." ";
    $horizon_bar[$c]=str_repeat("-",strlen($columns[$c]));
    for ($r=0; $r < $row_num ; $r++) {
      $tmp= " ".$rows[$r][$c].str_repeat(" ",$col_max_len-strlen($rows[$r][$c]))." ";
      // echo $tmp;
      $rows[$r][$c]=$tmp;
      // var_dump($rows[$r]);
      // code...
    }

  }
  echo "|".implode("|",$columns)."|\n";
  echo "|".implode("|",$horizon_bar)."|\n";
  foreach ($rows as $row) {
    echo "|".implode("|",$row)."|\n";
  }


}
function main()
{
  solve(...stdin_handler());
}

main();

?>
