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
               background-image: url ("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLJRGS9nZpe1GyungaIE-9GLizN6EigFJKpGlF_U-3vgsC-R9PrqdvcSeWDw");
               background-size: cover;
           }
           div {
               display: inline-block;
           }
           input {
               border-radius: 2px;
           }
       </style>
       <meta charset="UTF-8">
       <title>Form Templates</title>
   </head>
   <body>
       <?php require 'templates/form.tpl.php'; ?>
   </body>
</html>