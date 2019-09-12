<?php
$siukslines_turis = 40;
$siuksliu_turis_per_d = 15;
$max_kaupo_turis = rand(40,45);
$dien = $siukslines_turis + $max_kaupo_turis;
$dien = $dien / $siuksliu_turis_per_d;
$dienu = floor($dien);
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <title> Pirkti geliu</title>
    </head>
    <body>
      <h2>Po kiek dienu kils barnis</h2>
      <h3> Po <?php print $dienu . ' dienu nuo '. date('Y-m-d'); ?> pirk geliu ir sampano, jeigu nori isvengti konflikto</h3> 
          
</html>