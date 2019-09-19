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

$tasksArray =[
    'keliames 6:00',
    'Sporto klubas',
    'Rytinis kamstis'.
    'Code Academy',
    'Vakarinis kamstis',
    'Netflix'
];

foreach ($array as $key => $diena) {
    if ($diena === 'workday'){    
        $array[$key] = $tasksArray;
        
        if ($key === 'friday'){
            $tasksArray[5] = 'Baras';
            $array[$key] = $tasksArray;
        }
    }
}
foreach ($array as $key => $diena){
    unset($array[$key]);
}
var_dump($array);

