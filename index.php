<?php

$mano_atmint = ['vasara', 'jura', 'dziaudsmas', 'saule',
               'kalnai', 'geles', 'smelis', 'vejas'
];
$draugo_atmint = ['snegas', 'kalnai', 'slides', 'rogutes',
                  'ledas', 'vejas', 'saule', 'dziaugsmas'
];

?>

<html>
    <head>
        <meta charset ="UTF-8">
        <title>Uzduotis #3</title>
    </head>
    <body>
        <h2>Draugo atmintis</h2>
        <ul>
            <?php foreach ($draugo_atmint as $prisiminimai): ?>
            <li><?php print $prisiminimai;?></li>
            <?php endforeach;?>
        </ul>
    </body>    
</html>


