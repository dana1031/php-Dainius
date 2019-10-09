<?php

function validate_not_empty($field_input, &$field) {
    if ($field_input === '') {
        $field['error'] = 'Laukas negali bûti tuðèias!';
        return false;
    }
    return true;
}

function validate_is_number($field_input, &$field) {
    if (!is_numeric($field_input)) {
        $field['error'] = 'Áveskite skaièiø!';

        return false;
    }
    return true;
}

function validate_password($field_input, &$field) {
    if (strlen($field_input) <= 8) {
        $field['error'] = 'Ávesta per maþai simboliø!';
        return false;
    }
    return true;
}

//function validate_max_100($field_input, &$field) {
//    if ($field_input > 100) {
//        $field['error'] = 'Per daug metø!';
//        return false;
//    }
//    return true;
//}
//
//function validate_is_positive($field_input, &$field) {
//    if ($field_input < 0) {
//        $field['error'] = 'Áveskite teigiamà skaièiø!';
//        return false;
//    }
//    return true;
//}
//
//function validate_is_email($field_input, &$field) {
//    if ($field_input = !preg_match("/^[a-zA-Z ]*$/")) {
//        $field['error'] = 'Áveskite teisingà el.paðto adresà!';
//        return false;
//    }
//    return true;
//}
//function get_form_input($form) {
//    $filter_parameters = [];
//
//    foreach ($form['fields'] as $field_id => $field) {
//        $filter_parameters[$field_id] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
//    }
//
//    return filter_input_array(INPUT_POST, $filter_parameters);
//}
//


