

//$array = [
//    'vardas',
//    'pavarde',
//    'amzius' => [
//        10 => [
//            'mokslevis'
//        ],
//        20 => [
//            'studentas'
//        ],
//    ]
//];
//var_dump($array);
//print $array['amzius'][20][0]; //print 'studentas'

//$array = [
//    'participantis' => [
//        [
//            'name' => 'Juozas',
//            'surname' => 'Juozaitis',
//            'age' => 86
//        ],
//        [
//            'name' => 'Dalia',
//            'surname' => 'Ziemkalnyte',
//            'age' => 28
//        ],
//        [
//            'name' => 'Mantas',
//            'surname' => 'Juozaitis',
//            'age' => 4
//        ]
//    ]
//];
//
//var_dump($array['participantis']);
//$age = [];
//foreach ($array['participantis'] as $person) {
//   $age[] = $person['age'] ; 
//}
//var_dump($age);
//?>
<?php

$params = [];

$fields = ['vardas', 'pavarde'];
var_dump($fields);
foreach ($fields as $field) {
    $params[$field] = FILTER_SANITIZE_SPECIAL_CHARS;
    var_dump($field);
}

$input = filter_input_array(INPUT_POST, $params);



var_dump($params);

?>
<html>
    

<form method  = "POST">
<input type = "text" name = "vardas" value = "<bocmanas>" >
<input type = "text" name = "Pavarde" value = "Bebriukas" >
<button> submit</button>
</form>
    </html>