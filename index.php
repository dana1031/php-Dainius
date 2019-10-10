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

function form_fail($filtered_input, &$form) {
    $form['message'] = 'Fail!';
}
function form_success($filtered_input, &$form) {
    $form['message'] = 'success!';
    var_dump($filtered_input);
    
    $file = 'data/db.txt';
    array_to_file($filtered_input, $file);
}
    
function array_to_file($array, $file) {
    $string = json_encode($array);
    $file = file_put_contents($file, $string);

    if ($file !==false){
        return true;
    }    
        return false;
}

function file_to_array($file) {
    if (file_exists($file)){
      $encoded_array = file_get_contents($file);
      return json_decode($encoded_array, true);
    }
    return false;

}

var_dump(file_to_array('data/db.txt'));

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