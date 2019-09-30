<?php
var_dump($_POST);
$answer = 0;

function sguare($x) {
    return $x**2;
}

if (isset($_POST['enter'])) {
    print 'forma gauta';
    $answer = sguare($_POST['skaicius']);
}
?>

<html>
    <head>    
        <meta charset="UTF-8">
        <title> forms </title>
    </head>
    <body>
        <form  action ="index.php" method = "POST">
            <span>Ką pakelti kvadratu:</span>    
            <input name = "skaicius" type = "number" reguired>    
            <input name = "enter"   type = "submit"> 
            <h1> Atsakymas:<?php print $answer; ?></h1>
        </form> 
    </body>        