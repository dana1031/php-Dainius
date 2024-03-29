<?php
require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';


$form = [
    'title' => 'Create Team',
    'fields' => [
        'team_name' => [
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Team name',
                    'validate' => 'validate_team',
                ],
            ],
            'validators' => [
                'validate_not_empty',
                'validate_team',
            ],
        ],
    ],    
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'Create',
        ],
    ],
    'message' => '',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];
function form_success($filtered_input, $form) { // vykdoma, jeigu forma uzpildyta teisingai
    $users_array = file_to_array('data/teams.txt'); // users_array - kiekvieno submit metu uzkrauna esama teams.txt reiksme, ir padaro masyvu
    var_dump($users_array);
    $filtered_input['players'] = [];
    
    $users_array[] = $filtered_input; // einamuoju indeksu prideda inputus i users_array
    var_dump($users_array);
    array_to_file($users_array, 'data/teams.txt'); // User_array konvertuoja i .txt faila JSON formatu
  //  header('location: join.php'); 
}

$filtered_input = get_filtered_input($form);
if (!empty($filtered_input)) {
  
    $success = validate_form($filtered_input, $form);
}

function form_fail($filtered_input, $form) { //vykdoma ,jeigu forma uzpildyta teisingai
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forma</title>
        <link rel="stylesheet" href="includes/style.css">
    </head>
    <style>
        .container {
            display: flex;
            margin: 50px 0 0 0;
            padding: 20px 0 0;
            justify-content: center;
        }
        body {
            background-image: url("https://images.pexels.com/photos/1470168/pexels-photo-1470168.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
            background-size: cover;
        }
        select,
        input[type="submit"],
        input[type="text"] {
            font-family: 'Libre Caslon Display', serif;
            height: 60px;
            width: 200px;
            font-size: 1rem;
            display: block;
            margin: 1.5rem auto 0.5rem;
            font-size: 1,5rem;
            border: 2px solid #deb891;
            background: rgb(230, 216, 216);
            background: linear-gradient(
                0deg,
                rgb(145, 92, 92) 8%,
                #333333 99%
                );
            color: #fff;
            text-align: center;
            
        }
        select:hover,
        input:hover {
            background: rgb(131, 101, 101);
            background-color: #deb891;
/*            background: linear-gradient(0deg, rgb(95, 51, 51)22%, rgb(17, 17, 17) 100%); */
            color: #fff;
            cursor: pointer;
            
        }
        .nav{
                margin-left: 0px;
                padding-left: 0px;
                list-style: none;
            }
            .nav li { 
                float: left;
            }
            ul.nav a {
                display: block;
                width: 5em;
                padding:10px;
                margin: 0 5px;
                background-color: #c5b19d;
                border: 1px solid #333;
                text-decoration: none;
                color: #333;
                text-align: center;
            }
            ul.nav a:hover{
                background-color:  #deb891;
                color: #f4f4f4;
            }
    </style>
    <body>
         <?php require 'navigation.php'; ?>
        <div class="container">
            <?php require 'templates/form.tpl.php'; ?>
        </div>
    </body>
</html>