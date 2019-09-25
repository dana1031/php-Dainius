<?php

$x = rand(1, 20);

function is_prime($x) {

    if ($x == 1) {
        return false;
    }
    for ($i = 2; ($i <= $x / 2); $i++) {
        if ($x % $i == 0) {
            return false;
        }
    }
    return true;
}

if (is_prime($x) == true) {
    $pirminis = $x . ' yra pirminis skaicius';
} else {
    $pirminis = $x . ' nera pirminis skaicius';
}
?>

<html>
    <body>
        <h1>
            <?php print $pirminis;?>
        </h1>
    </body>    
</html> 