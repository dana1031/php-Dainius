<?php

$grikai       = 5000;
$per_day = rand(200,500);

$grikai_mod = $grikai;
for ($i = 1; $grikai_mod >= 0; $i++ ) {
 $grikai_mod -= rand(200,500);
}

$data = date('Y-m-d', strtotime('+'. $i .'days' ));
$text = "Isgyvensiu dar $i dienu , iki $data ";
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Kiek dienu galiu valgyti grikius?</h1>
        <h2>Rasta grikiu: <?php print $grikai_mod; ?>g.</h2>
        <h3><?php print $text; ?></h3>
    </body>
</html>