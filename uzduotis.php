<?php 

 $array =[
     'vardas' => 'Dana',
     'pavarde => kucherenko'
 ];
 $encoded_array = json_encode($array);
 setcookie('mycookie', 'cookiedata',time() +3600, '/' );
 var_dump($_COOKIE);
// setcookie('mycookie', 'cookiedata',time() -1, '/' );
 
  setcookie('mycookie', 'cookiedata',time() +3600, '/' );

 
 
 
 setcookie('mycookie', $encoded_array,time() +3600, '/');
         var_dump($_COOKIE);
         $decoded_array = json_decode($COOKIE['cookiename'],true);
         var_dump($_COOKIE);