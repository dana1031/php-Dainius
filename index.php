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

//function blue_red($array) {
//    foreach ($array as $row) {
//        foreach ($row as $column) {
//          $item =$column;
//           if $item == 0; {
//                $classs = "blue";
//           } else {
//            $class = "red";
//           }
//        }
//    }
//    return($class);
//}    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <style>
            .row {
                display: block;
            }
            .blue {
                display: inline-block;
                background-color: blue;
                width: 40px;
                height: 40px;
            }
            .red {
                background-color: red;
                display: inline-block;
                width: 40px;
                height: 40px;
            } 
        </style>
    <body>

        <h1> slot_run</h1>
        



        
    <?php foreach ($array as $array_id => $row): ?> 
    <div class = "row">

      <?php foreach ($row as $elem): ?>
        <div class ="<?php if ($elem == 0){print 'red';} else {print 'blue';} ?>"></div>    
         
      <?php endforeach; ?>
    <div class ="<?php if ($elem == 0){print 'red';} else {print 'blue';} ?>"></div>     
    <?php endforeach; ?>
    </div>
               
    </body>
</html>

