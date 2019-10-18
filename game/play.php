<?php
require 'functions/form/core.php';
require 'functions/html/generators.php';
require 'functions/file.php';

session_start();

//$text = 'Go for it, ' . $_COOKIE['cookie_nickname'];
$text = 'Go for it, ' . $_SESSION['cookie_nickname'];

var_dump($_SESSION);

//if (empty($_COOKIE)) {
//   header('Location: join.php');
//   exit();
//}
if (empty($_SESSION)) {
   header('Location: join.php');
   exit();
}

$form = [
   'title' => "$text",
   'fields' => [],
   'buttons' => [
       'kick' => [
           'type' => 'submit',
           'value' => 'Kick the ball'
       ],
   ],
   'validators' => [
       'validate_kick'
   ],
   'callbacks' => [
       'success' => 'form_success'
   ]
];

function validate_kick($filtered_input, &$form) {
   $teams = file_to_array('data/teams.txt');
   foreach ($teams as $team) { 
       //if ($team['team_name'] == $_COOKIE['cookie_team']) {
       if ($team['team_name'] == $_SESSION['cookie_team']) {
           foreach ($team['players'] as $player) {
              // if ($player['nickname'] == $_COOKIE['cookie_nickname']) {
                if ($player['nickname'] == $_SESSION['cookie_nickname']) {
                   return true;
               }
           }
       }
   }
}

function form_success($filtered_input, &$form) {
   $teams = file_to_array('data/teams.txt'); 
   foreach ($teams as &$team) {    
      // if ($team['team_name'] == $_COOKIE['cookie_team']) {
       if ($team['team_name'] == $_SESSION['cookie_team']) {
           foreach ($team['players'] as &$player) {
               //if ($player['nickname'] == $_COOKIE['cookie_nickname']) {
               if ($player['nickname'] == $_SESSION['cookie_nickname']) { 
                   $player['score'] ++;
               }
           }
       }
   }
   array_to_file($teams, 'data/teams.txt');
   $form['message'] = "Spyris uzskaitytas ({$player['score']})";
}

if (get_form_action() == 'kick') {
   validate_form([], $form);
}

?>
<html>
   <head>
       <style>
           .container {
               display: flex;
               margin: 50px 0 0 0;
               padding: 20px 0 0;
               justify-content: center;
           }
           body {
               background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQYz7vV62e51FTuSD5XDstSBNtVxMYADhE1d6QrLW_0mgD7obFz");
               background-size: cover;
           }
           div {
               display: inline-block;
           }
           input {
               border-radius: 2px;
           }
           ul.nav{
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
                background-color: #f4f4f4;
                border: 1px dashed #333;
                text-decoration: none;
                color: #333;
                text-align: center;
            }
            ul.nav a:hover{
                background-color: #333;
                color: #f4f4f4;
            }
       </style>
       <meta charset="UTF-8">
       <title>Form Templates</title>
   </head>
   <body>
       <?php require 'templates/form.tpl.php'; ?>
       <?php require 'navigation.php'; ?>
       
   </body>
</html>