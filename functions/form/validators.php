<?php

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

function validate_max_100($field_input, &$field) {
    if ($field_input > 100) {
        $field['error'] = 'Per daug metų!';
        return false;
    }
    return true;
}

function validate_is_positive($field_input, &$field) {
    if ($field_input < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių!';
        return false;
    }
    return true;
}

function validate_password($field_input, &$field) {
    if (strlen($field_input) < 8) {
        $field['error'] = 'Įveskite daugiau nei 8 simbolius!';
        return false;
    }
    return true;
}

/**
 * 
 * @param array $field_input
 * @param  $field
 */
function validate_team($field_input, &$field) {
    $teams = file_to_array('./data/users.txt');

    if (!empty($teams)) {
        foreach ($teams as $value) {
            if ($value['team_name'] == $field_input) {
                $teams = file_to_array('./data/users.txt');
                $field['error'] = 'Tokia komanda jau egzistoja';
                return false;
            }
        }
    }

    return true;
}

function validate_fields_match($filtered_input, &$form, $params) {

    $referense_value = $filtered_input[$params[0]];

    foreach ($params as $field_id) {
        if ($referense_value !== $filtered_input[$field_id]) {
            $form['fields'][$field_id]['error'] = 'Laukeliai nesutampa';
            var_dump($form['fields'][$field_id]);
            return false;
        }
    }
    return true;
}

function validate_email_unique($field_input, &$field) {

    $user_email = file_to_array('./data/users.txt');
    if (!empty($user_email)) {
        
        $unic_email = $field_input;

        foreach ($user_email as $user) {
            if ($user['email'] == $unic_email) {
                var_dump('toks emailas jau egzistoja');
                $field['error'] = 'Toks emailas jau egzistoja';
                return false;
            }
        }
    }
    return true;
}
 
