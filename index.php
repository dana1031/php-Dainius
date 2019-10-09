<?php
$form = [
    'attr' => [
        'action' => 'index.php',
        'class' => 'bg-black'
    ],
    'title' => 'suma x+y',
    'fields' => [
        'x' => [
            'type' => 'number',
            'label' => 'x',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter x',
                    'class' => 'input-text',
                    'id' => 'x_id'
                ]
            ],
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
            ]
        ],
        'y' => [
            'type' => 'number',
            'label' => 'y',
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter y',
                    'class' => 'input-text',
                    'id' => 'y_id'
                ]
            ],
            'validators' => [
                'validate_not_empty',
                'validate_is_number',
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'type' => 'submit',
            'value' => ''
        ],
        'reset' => [
            'type' => 'reset',
            'value' => 'Išvalyti'
        ]
    ],
    'message' => 'Užpildyk formą!',
    'callbacks' => [
        'fail' => 'form_fail',
        'success' => 'form_success'
    ]
];

/**
 * Generates HTML attributes
 * @param array $attr
 * @return string
 */
function html_attr($attr) {
    $html_attr_array = [];

    foreach ($attr as $attribute_key => $attribute_value) {
        $html_attr_array[] = strtr('@key="@value"', [
            '@key' => $attribute_key,
            '@value' => $attribute_value
        ]);
    }

    return implode(' ', $html_attr_array);
}

function validate_not_empty($field_input, &$field) {
    if ($field_input === '') {
        $field['error'] = 'Laukas negali būti tuščias!';
        return false;
    }

    return true;
}

function validate_is_number($field_input, &$field) {
    if (!is_numeric($field_input)) {
        $field['error'] = 'Įveskite skaičių!';
        return false;
    }

    return true;
}

/**
 * Sanitizes all form inputs
 * @param array $form
 * @return array
 */
function get_form_input($form) {
    $filter_parameters = [];
    foreach ($form['fields'] as $field_id => $field) {
        $filter_parameters[$field_id] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
    }

    return filter_input_array(INPUT_POST, $filter_parameters);
}

function validate_form($filtered_input, &$form) {
    $success = true;

    foreach ($form['fields'] as $field_id => &$field) {
        $field_input = $filtered_input[$field_id];
        $field['value'] = $field_input;
        foreach ($field['validators'] ?? [] as $validator) {
            $is_valid = $validator($field_input, $field);
            if (!$is_valid) {
                $success = false;
                break;
            }
        }
    }

    if ($success) {
        if (isset($form['callbacks']['success'])) {
            $form['callbacks']['success']($filtered_input, $form);
        }
    } else {
        if (isset($form['callbacks']['fail'])) {
            $form['callbacks']['fail']($filtered_input, $form);
        }
    }

    return $success;
}

function form_fail($filtered_input, &$form) {
    $form['message'] = 'Yra klaidų!';
}

$filtered_input = get_form_input($form);
if (!empty($filtered_input)) {
    validate_form($filtered_input, $form);
}
$suma = 0;

function form_success($filtered_input, $form) {

    $suma = $filtered_input['x'] + $filtered_input['y'];

    var_dump("Suma: $suma");
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
