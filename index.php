<?php

$array = [];

function slot_run($size) {
    for ($i = 0; ($i <= $size); $i++) {
        for ($j = 0; ($j <= $size); $j++) {
            $array[$i][$j] = rand(0, 1);
        }
    }

    return $array;
}

$array = slot_run(3);
var_dump($array);
?>



