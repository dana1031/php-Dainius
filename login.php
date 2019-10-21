<?php
require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';

session_start();

$form = [
    'title' => 'Login form',
    'fields' => [
        'email' => [
            'type' => 'text',
            'validators' => [
                'validate_not_empty',
            //   'validate_email',
            //   'validate_email_unique',
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'enter email',
                ]
            ],
        ],
        'password' => [
            'type' => 'password',
            'validators' => [
                'validate_not_empty',
            //   'validate_password', // 8 zenklai
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'enter password',
                ]
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'Login',
            'class' => 'button'
        ],
    ],
    'validators' => [
        'validate_login',
    // 'validate_fields_match' => [
    //     'password',
    //     'password_repeat',
    ],
    'message' => '',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];


$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($filtered_input, $form);
}

function validate_login($filtered_input, &$form) {

    $users = file_to_array('data/users.txt');

    if (!empty($user_login)) {
        foreach ($users as $user) {
            if ($user['email'] === $filtered_input['email'] && $user['password'] === $filtered_input['password']) {
                return true;
            }
        }
        
        $form['fields']['password']['error'] = 'Neegzistoja';
        return false;
    }
}

function form_fail($filtered_input, $form) {
    var_dump('nepavyko');
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Forma</title>
        <link rel="stylesheet" href="includes/style.css">
        <style>
            .container {
                display: flex;
                margin: 50px 0 0 0;
                padding: 20px 0 0;
                justify-content: center;
            }
            body { //background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSy43Cvx79gAqGjgmnI4czKwh11i2t6NEFYRMW55A6otoGx9d7Q");
                   // background-image: url("http://www.saitas.lt/wp-content/uploads/2016/05/975x660_YAO-NOI_140x87.gif");
                   //  background-image: url("https://images.pexels.com/photos/1470168/pexels-photo-1470168.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
                   background-size: cover;
            }
            select,
            input[type="submit"],
            input[type="text"],
            input {
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
    </head>
    <body>
<?php require 'navigation.php'; ?>
        <div class="container">
<?php require 'templates/form.tpl.php'; ?>
        </div>
    </body>
</html>