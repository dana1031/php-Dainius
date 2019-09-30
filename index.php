<?php
var_dump($_POST);
$value = 0;


if (isset($_POST['enter'])) {
    $value = $_POST['enter'];
    $value++;
}
?>

<html>
    <head>    
        <meta charset="UTF-8">
        <title> forms </title>
    </head>
    <body>
        <form  action ="index.php" method = "POST">
            <span>Padidintas skaicius:</span>    

            <input name = "enter"   value = "<?php print $value; ?>" type = "submit"> 

        </form> 
    </body>       