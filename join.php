<?php
require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';

function get_options() {
    $teams = file_to_array('data/teams.txt');
    if (!empty($teams)) {
        foreach ($teams as $team) {
            var_dump($team);
            $team_names[$team['team']] = $team['team'];
        }
        return $team_names;
    }
}

var_dump($_POST);
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

function form_success($filtered_input, $form) { // vykdoma, jeigu forma uzpildyta teisingai
    $teams = file_to_array('data/teams.txt'); // users_array - kiekvieno submit metu uzkrauna esama teams.txt reiksme, ir padaro masyvu
    var_dump($teams);
    foreach ($teams as &$team) {
        if ($team['team'] === $filtered_input['team_select']) {
            $team['players'][] = [
                'nickname' => $filtered_input['player_name'],
                'score' => 0
            ];
        }
    }

    array_to_file($teams, 'data/teams.txt');
   
    setcookie('cookie_nickname', $filtered_input['player_name'], time() + 3600, '/');
    setcookie('cookie_team', $filtered_input['team_select'], time() + 3600, '/');

    
}
function validate_player($field_input, &$field) {
   $teams = file_to_array('data/teams.txt');
   foreach ($teams as $team) {
       var_dump($team);
       
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
if (!empty($filtered_input)) {

    $success = validate_form($filtered_input, $form);
}

function form_fail($filtered_input, $form) { //vykdoma ,jeigu forma uzpildyta teisingai
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Templates</title>
        <?php
        if( isset($_COOKIE['players_name']))
           print "Welcome " . $_COOKIE['players_name'] . "<br />";
        
        else
           print"Sorry... Not recognized" . "<br />";
     ?>
     
    </head>
    <body>
        <?php require 'templates/form.tpl.php'; ?>
    </body>
</html>


