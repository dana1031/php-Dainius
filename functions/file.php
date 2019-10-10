<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function array_to_file($array, $file) {
   $string = json_encode($array);
   $file = file_put_contents($file, $string);
   if ($file !== false) {
       return true;
   }
   return false;
}
function file_to_array($file) {
   if (file_exists($file)) {
       $encoded_array = file_get_contents($file);
       return json_decode($encoded_array, true);
   }
   return false;
}