<?php
require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';

session_start();

function get_options() {
    $teams = file_to_array('data/teams.txt');
    if (!empty($teams)) {
        foreach ($teams as $team) {
        
            $team_names[$team['team_name']] = $team['team_name'];
        }
        return $team_names;
    }
}

//var_dump($_POST);
$form = [
    'fields' => [
        'player_name' => [
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Player name',
                ]
            ],
            'validators' => [
                'validate_not_empty',
                'validate_player'
            ]
        ],
        'team_select' => [
            'type' => 'select',
            'value' => '',
            'options' => get_options(),
            'validators' => [
                'validate_not_empty'
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'Join'
        ],
    ],
    'callbacks' => [
        'fail' => 'form_fail',
        'success' => 'form_success'
    ]
];

function form_success($filtered_input, &$form) { // vykdoma, jeigu forma uzpildyta teisingai
    $teams = file_to_array('data/teams.txt'); // users_array - kiekvieno submit metu uzkrauna esama teams.txt reiksme, ir padaro masyvu
    foreach ($teams as &$team) {
        if ($team['team_name'] == $filtered_input['team_select']) {
            $team['players'][] = [
                'nickname' => $filtered_input['player_name'],
                'score' => 0
            ];
        }
    }
 
   array_to_file($teams, 'data/teams.txt');
   
$_SESSION['cookie_nickname'] = $filtered_input['player_name'];
$_SESSION['cookie_team'] = $filtered_input['team_select'];

//   setcookie('cookie_team', $filtered_input['team_select'], time() + 36000, '/');
//   setcookie('cookie_nickname', $filtered_input['player_name'], time() + 36000, '/');

}
function validate_player($field_input, &$field) {
   $teams = file_to_array('data/teams.txt');
   foreach ($teams as $team) {
 //      var_dump($team);
       
       foreach ($team['players'] as $player) {
           if (strtoupper($player['nickname']) == strtoupper($field_input)) {
               $field['error'] = 'Toks žaidėjas jau egzistuoja';
               return false;
           }
       }
   }
   return true;
}
$filtered_input = get_filtered_input($form);

if (isset($_SESSION['cookie_nickname'])) {
    $text = 'Jau esi prisijunges kaip '. $_SESSION['cookie_nickname'];
}

function form_fail($filtered_input, $form) { //vykdoma ,jeigu forma uzpildyta teisingai
}

var_dump($_SESSION);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Templates</title>
        <style>
        .container {
            display: flex;
            margin: 50px 0 0 0;
            padding: 20px 0 0;
            justify-content: center;
        }
        body {
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQhbcTZj9oswdsoxfpAKUTMB-FT9zqTHJr-5HCb1HdmY8BpWXj0");
            background-size: cover;
        }
        div {
            display: inline-block;
        }
        input[type="submit"],
        input[type="text"] {
            font-family: 'Libre Caslon Display', serif;
            height: 60px;
            width: 250px;
            font-size: 1rem;
            display: inline-block;
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
            
        }
        input[type="submit"]:hover {
            background: rgb(131, 101, 101);
            background-color: #deb891;
/*            background: linear-gradient(0deg, rgb(95, 51, 51)22%, rgb(17, 17, 17) 100%); */
            color: #ccc;
            cursor: pointer;
        }
    </style>
        
     
    </head>
    <body>
         <?php if (isset($_SESSION['cookie_nickname'])): ?>
           <h2><?php print $text; ?></h2>
       <?php else: ?>
           <?php require 'templates/form.tpl.php'; ?>
       <?php endif; ?>
    </body>
</html>


