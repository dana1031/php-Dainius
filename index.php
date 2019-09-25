<?php

$array = [];
function slot_run($size) {
 for ($i=0; ($i <= $size); $i++) {
     for($j = 0; ($j <= $size); $j++) {
     $array[$i][$j] = rand(0,1);      
  }
   $array[$i][$j] = rand(0,$size);
 }
  return ($array); 
}
$size = rand(0,5);
$array = slot_run($size);
var_dump($array); 

?>


  
 