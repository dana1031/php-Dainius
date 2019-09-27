<?php

//Turime masyvą:$array = ['w','t','r','r','t'];
//Parašyti f-iją
//change_values($array, $val_from, $val_to)
//kuri visus elementus lygius
//$val_from pakeistų į $val_to
//
//F-ija turi veikti reference‘ų pagalba, be return‘o.

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