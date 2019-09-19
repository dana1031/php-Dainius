<?php

$array = ['monday', 'tuesday', 'wednesday', 'friday', 'saturday', 'sunday'];
$array = [
      'monday',
      'tuesday',
      'wednesday',
      'thursday',
      'friday',
      'saturday',
      'sunday'
]; 
$array[4] = 'Blackout';
unset($array[4]);
$array =[
    'monday'    => 'workday',
    'tuesday'   => 'workday',
    'wednesday' => 'workday',
    'thursday'  => 'workday',
    'friday'    => 'workday',
    'saturday'  => 'weekday',
    'sunday'    => 'weekday'
];
var_dump($array);
