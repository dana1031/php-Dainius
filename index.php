<?php
$x =4;
$y =5;
function sum($x,$y){
    $sum = $x + $y;
    return $sum;
}   
$sum = sum($x,$y);

?>

<html>
    <body>
        <h1>
            <?php print $x;?>ir<?php print $y; ?>suma:<?php print $sum;?>
        </h1>
    </body>
        
</html> 