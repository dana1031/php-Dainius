<?php

$ship = ['bee'];

for ( $i=0; $i < 5; $i++) {
    $ship[] = &$ship[$i];
  
}
var_dump($ship);

// 0 => string 'bee' (length=3)
//  1 => string 'bee' (length=3)
//  2 => string 'bee' (length=3)
//  3 => string 'bee' (length=3)
//  4 => string 'bee' (length=3)
//  5 => string 'bee' (length=3)