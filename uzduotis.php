<?php

$receptai =[];

$ingrediemtai = [
    'obuolys',
    'miltai',
    'cukrus',
    'pienas'
];
//$receptai = [
//    'pyragas' => [
//        'obuolys',
//        'miltai',
//        'cukrus',
//         'pienas'
//    ]
//];
$pyragas =[];

foreach ($ingrediemtai  as $ingredient) {

    $pyragas['pyragas'][] =  $ingredient;
    
}
var_dump ($pyragas);
var_dump ($receptai);