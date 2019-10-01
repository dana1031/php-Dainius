<?php
$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form'
    ],
    'fields' => [
        'first_name' => [
            'type' => 'text',
            'label' => 'vardas',
            'placeholder' => 'Piotr'
        ],
        'last name' => [
            'type' => 'text',
            'label' => 'Pavarde',
            'placeholder' => 'Piotrowski'
        ],
        'age' => [
            'type' => 'number',
            'label' => 'age',
            'placeholder' => '25'
        ]
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'send'
        ],
        'reset' => [
            'type' => 'reset',
            'value' => 'delete'
        ],
    ]
];
/* * Generates HTML atributes
 * @param array $attr
 * @return string
 */

function html_attr($attr) {
    $attr_array = [];
    foreach ($attr as $key => $value) {
//         $attr_array[] = "$key=" . "$value";
        $attr_array[] = strtr('@key="@value"', [
            '@key' => $key,
            '@value' => $value
        ]);
    }

    return implode(" ", $attr_array);
}
?>
<html>
    <head>

    </head>
    <body>
<?php require 'templates/form.tpl.php'; ?>
    </body>
</html>