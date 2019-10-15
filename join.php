<?php
require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';
function get_options() {
    $team_name[] = ' ';
    $teams = file_to_array('data/teams.txt');
    foreach ($teams as $team) {
        $team_names[] = $team['team'];
        var_dump($team_names);
    }
    
    return $team_names;
}
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
                'validate_team'
            ]
        ],
        'team_select' => [
            'type' => 'select',
            'value' => '',
            'options' =>  get_options(),
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
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Templates</title>
    </head>
    <body>
        <?php require 'templates/form.tpl.php'; ?>
    </body>
</html>



