<?php

require 'functions/html/generators.php';
require 'functions/form/core.php';
require 'functions/file.php';

$form = [
    'attr' => [
        'action' => 'index.php',
    ],
    'fields' => [
        'team' => [
            'type' => 'text',
            'extras' => [
                'attr' => [
                    'placeholder' => 'Team name',
                    'class' => 'nes-input',
                ],
            ],
            'validate' => ['validate_not_empty'],
            'validate' => ['validate_team'],
        ],
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'class' => 'nes-btn is-success',
        ],
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];

//$teams = [
//    [
//        'team-name' => 'team-nameAAA',
//        'players' => [
//            [
//                'nickname' => 'lox',
//                'score' => 'aaa'
//            ],
//        ],
//    ],
//    [
//        'team-name' => 'team-nameBBB',
//        'players' => [
//            [
//                'nickname' => 'bbbb',
//                'score' => 'bbbb'
//            ],
//        ],
//    ],
//];


function form_success($filtered_input, $form) { // vykdoma, jeigu forma uzpildyta teisingai
    $users_array = file_to_array('data/teams.txt'); // users_array - kiekvieno submit metu uzkrauna esama teams.txt reiksme, ir padaro masyvu
    var_dump(users_array);
    $filtered_input['players'] = [];
   $users_array[] = $filtered_input; // einamuoju indeksu prideda inputus i users_array
    array_to_file($users_array, 'data/teams.txt'); // User_array konvertuoja i .txt faila JSON formatu
}

$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    $success = validate_form($filtered_input, $form);
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form from arrays, templates and 'require'</title>
        <!-- latest -->
        <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet"/>
        <!-- core style only -->
        <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet"/>

        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet"/>

        <style>
            body {
                background: grey;
            }
            .container {
                display: flex;
                margin: 100px 0 0 0;
                padding: 20px 0 0;
                justify-content: center;
            }

            form div {
                display: inline;
            }

            input {
                width: 100px;
                border-radius: 5px;
                border: 1px solid grey;
                background-color: green;
            }

            input[type="submit"] {
                margin: 10px 0 0;
                width: 130px;
                background-color: green;
                color: white;
            }

            input[type="submit"]:hover {
                background-color: green;
                cursor: pointer;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <?php require 'templates/form.tpl.php'; ?>
        </div>

    </body>
</html>


