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
            'attr' => [
                'type' => 'text'
            ],
            'extra' => [
                'class' => 'blue',
                'placeholder' => 'Piotr'
            ],
            'label' => 'vardas',
        ],
        'last name' => [
            'attr' => [
                'type' => 'text',
            ],
            'extra' => [
                'class' => 'blue',
                'placeholder' => 'Piotrowski',
            ],
            'label' => 'Pavarde',
            'error' => 'Klaida!',
        ],
        'select' => [
            'attr' => [
                'type' => 'select',
            ],
            'options' => [
                'vyras' => 'Vyras',
                'moteris' => 'Moteris',
                'vaikas' => 'Vaikas'
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => 'send',
        ],
        'reset' => [
            'type' => 'reset',
            'value' => 'delete'
        ],
    ],
    'massage' => 'pavyko!!!',
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