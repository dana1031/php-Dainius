<?php

$form = [ 
    'attr' =>[
         'action' => 'index.php',
         'method' => 'POST',
         'class'  => 'my-form',
         'id' => 'login-form'
    ],    
];

 function html_attr($attr) {
     $attr_array = [];
     foreach ($attr as $key => $value){
//         $attr_array[] = "$key=" . "$value";
          $attr_array[] =strtr('@key="@value"',[
              '@key' => $key,
              '@value' => $value
           ]);       
         
//         var_dump($attr_array);
     }
     return implode(" ", $attr_array);
      
 }
 
var_dump(html_attr($form['attr']));
?>
<html>
    <head>

    </head>
    <body>
        <?php require 'templates/form.tpl.php'; ?>
    </body>
</html>