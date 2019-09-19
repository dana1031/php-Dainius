<?php

$daiktai =['pinigine', 'uzrasu knygele', 'parkeris', 'sukos',' lupu dazai','raktai'];
    
$kart =rand(1,5);
$rankinukas = [];

for ($i = 0; $i < $kart; $i++) {
    $index = rand(1,5);
    $rankinukas[$i]['name'] = $daiktai[$index];
    $rankinukas[$i]['size'] = rand(1,10);
}
var_dump($rankinukas);
?>
<html>
    <head>
        <meta charset = "UTF-8">   
        <title>Rankinuke</title>
    </head>
    <body>
        <h1>Ka moteris turi rankinuke</h1>
        <ul><?php foreach ($rankinukas as $item):?></ul>
      
                   <li><?php print $item['name']; ?> uzima
                        <?php print $item['size']; ?>   cm3
                    </li>
                  <?php endforeach; ?>
    </body>            
</html>
