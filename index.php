<html> 
    <head>
        <meta charset="UTF-8">
        <title>PHP lydes ir <?php date('Y-m-d', strtotime('+rand(1,10) Years'));?> </title>
    </head>
    <body>
        <h1> Vardas- Galbut turesiu <?php print rand(1, 5) ?> <br>
            vaiku !<br> 
            <p> Trumpas nebebus prezidentu:
                <?php print date('Y-m-d', strtotime('+rand(2,10) Years')); ?>
            </p>
    </body>   
</html> 