<?php
$skola1= rand(1,100);
$skola2= rand(101,100);
$skola3 = rand(201,100);
$skola4= rand(301,100);
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <title> Variable</title>
    </head>
    <body>
          <h2>Skolos skaiciuokle</h2>
          <h3>Jei paemei <?php print $skola1 . 'Eur.';?></h3> 
          <h3>Grazink per metu<?php print $skola2 .'Eur.';?></h3>
          <h3>Grazink per 2 metus <?php print $skola3 . 'Eur.';?></h3>
    </body>
</html <