<?php
$geotags_list=array
(
  array("Japan","Tokyo"),
  array("Japan","Osaka"),
  array("UK","London"),
);
var_dump($geotags_list);
echo "array_unique\n";
foreach($geotags_list as $geotags){
  foreach($geotags as $tag){
    if( isset( $result[ $tag ] ) ){
      $result[ $tag ] += 1;
      }else{
      $result[ $tag ] = 1;
    }
  }
}
var_dump($result);
