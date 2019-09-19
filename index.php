<?php

$array =[
    'monday'    => 'workday',
    'tuesday'   => 'workday',
    'wednesday' => 'workday',
    'thursday'  => 'workday',
    'friday'    => 'workday',
    'saturday'  => 'weekday',
    'sunday'    => 'weekday'
];
foreach ($array as $key => $diena) {
    if ($key == 'friday'){
        print "$key yra gera diena";   
    }   
}
var_dump($array);

