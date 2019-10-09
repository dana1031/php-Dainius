<?php

require 'functions/form/core.php';
require 'functions/html/generators.php';

$form = [
    'attr' => [
        'action' => 'index.php',
        'class' => 'bg-black'
    ],
    'title' => 'Login form',
    'fields' => [
        'nickname' => [
            'type' => 'text',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter nickname',
                    'class' => 'input-text',
                    'id' => 'nickname'
                ]
            ],
            'validators' => [
                'validate_not_empty'
            ],
            'label' => 'Nickname:'
        ],
        'password' => [
            'type' => 'password',
            'value' => '',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter password',
                    'class' => 'input-text',
                    'id' => 'password'
                ]
            ],
            'validators' => [
                'validate_not_empty',
                'validate_password'
            ],
            'label' => 'Password:'
        ]
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'Submit'
        ],
        'reset' => [
            'type' => 'reset',
            'value' => 'Clear'
        ]
    ],
    'message' => '',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
];
var_dump($form);
function form_success($filtered_input, $form) {
//    $suma = $filtered_input['pirmas'] + $filtered_input['antras'];
    var_dump('You in!');
}
function form_fail($filtered_input, $form) {
    var_dump('Retard alert!');
}
$filtered_input = get_filtered_input($form);
if (!empty($filtered_input)) {
    validate_form($filtered_input, $form);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Templates</title>
        <link rel="stylesheet" href="includes/style.css">
    </head>
    <body>
        <?php require 'templates/form.tpl.php'; ?>
    </body>
</html>