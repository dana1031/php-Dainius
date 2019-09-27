<?php

$sheep = ['bee'];

for ( $i=0; $i < 5; $i++) {
    $sheep[] = &$sheep[$i];
  
}
$sheep[0] = 'sveiki';
var_dump($sheep);
foreach ($sheep as $key => $value){
  
    unset($sheep[$key]); 
    $sheep[$key] = $value;
}
$sheep[3] = 'velniop sistema';
var_dump ($sheep);
//array (size=6)
//  0 => string 'sveiki' (length=6)
//  1 => string 'sveiki' (length=6)
//  2 => string 'sveiki' (length=6)
//  3 => string 'sveiki' (length=6)
//  4 => string 'sveiki' (length=6)
//  5 => string 'sveiki' (length=6)
//C:\Users\demo\Desktop\www\index.php:17:
//array (size=6)
//  0 => string 'sveiki' (length=6)
//  1 => string 'sveiki' (length=6)
//  2 => string 'sveiki' (length=6)
//  3 => string 'velniop sistema' (length=15)
//  4 => string 'sveiki' (length=6)
//  5 => string 'sveiki' (length=6)