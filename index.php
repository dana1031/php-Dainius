<?php

$bank_report = [
    [
        'name' => 'iki darbo uzmokestis',
        'amount' => 600,
    ],
    [
        'name' => 'Kalvariju Nacnykas',
        'amount' => -15,
    ],
    [
        'name' => 'Geliu turgus',
        'amount' => 12,
    ]
];

foreach ($bank_report as $key => $value) {

    if ($value['amount'] > 0) {
        $bank_report[$key]['css_class'] = 'income';
    } else {

        $bank_report[$key]['css_class'] = 'expence';
    }
}
var_dump($bank_report);
?>


