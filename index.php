<html>
    <head>
        <meta charset="UTF-8">
        <title>Bomb img game, and date()</title>
        <style>
            .bomb-img {
                background-image: url(http://pngimg.com/uploads/bomb/bomb_PNG16.png);
                background-size: cover;
                width: <?php print date('s') * 2; ?>px;
                height: <?php print date('s') * 2; ?>px;
            }
            .bomb-img-00 {
                background-image: url(https://i.imgur.com/tNxskR4.jpg); 
                background-size: cover;
                width: 100px;
                height:100px;
            }   
        </style>
    </head>
    <body>
        <div class="bomb-img bomb-img-<?php print date('s'); ?>"></div>
        <div><?php print date('s'); ?></div>
    </body>
</html <