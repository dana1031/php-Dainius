<?php

//UŽDUOTIS H1
//$array = ['w','t','r','r','t'];
//Turime masyvą:
//Parašyti f-iją
//count_values($array, $val)
//kuri suskaičiuotų kiek masyve
//$array yra elementų su $val
//vertėmis

$array = ['w','t','r','r','t'];

function  change_values(&$array, $val_from, $val_to) {
  foreach ($array as &$raide) {
    if ($raide === $val_from) {
        $raide = $val_to;
    }    
  }
}
$backup = $array;

change_values($array, 't','T');
var_dump($array);
var_dump($backup);