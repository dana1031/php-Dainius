<?php

if (empty($_COOKIE)) {
    $id = rand(100000, 999999);
    $visits = 1;
} else {
    $id = $_COOKIE['user_id']; 
    $visits = ++$_COOKIE['visits'];
}

setcookie('user_id', $id, strtotime('+30 days'));
setcookie('visits', $visits, strtotime('+30 days'));

$h1_text = "User ID: $id";
$h2_text = "Visits: $visits";

?>
<html>
    <head>
        <title>Cookie Visits Tracking</title>
    </head>
    <body>
        <h1><?php print $h1_text; ?></h1>
        <h1><?php print $h2_text; ?></h1>            
    </body>
</html>