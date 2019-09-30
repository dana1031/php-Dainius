<?php
var_dump($_POST);
$value = 0;
$img = "https://media.istockphoto.com/photos/banana-picture-id636739634?k=6&m=636739634&s=612x612&w=0&h=BQ9Z6DobjFzclh3LN7nKSljrRqycJPCq65CS8rtUHU4=";

if (isset($_POST['enter'])) {
    $value = $_POST['enter'];
    $value++;
}

?>

<html>
    <head>    
        <meta charset="UTF-8">
        <title> forms </title>
        
        <style>
            .bananas{
             background-image: url("https://media.istockphoto.com/photos/banana-picture-id636739634?k=6&m=636739634&s=612x612&w=0&h=BQ9Z6DobjFzclh3LN7nKSljrRqycJPCq65CS8rtUHU4=");
             background-size: cover;
             display: inline-block;
         
                width: 150px;
                height: 150px;
            }
            
             
        </style>
    </head>
    <body>
        <form  action ="index.php" method = "POST">
            <span>Bananų skaicius:</span>    
            <input name = "enter"   value = "<?php print $value; ?>" type = "submit"> 
        </form> 
        <?php for ($i = 1; $i <= $value; $i++): ?>
        <div class ="bananas"> </div>
        <?php endfor;?>
    </body>       