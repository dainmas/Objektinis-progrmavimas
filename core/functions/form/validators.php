<?php
function validate_not_empty($field_input, &$field) {
    if ($field_input === '') {
        $field['error'] = 'Laukas negali būti tuščias!';
        return false;
    } else {
        return true;
    }
}
function validate_is_number($field_input, &$field) {
    if (!is_numeric($field_input)) {
        $field['error'] = 'Turi būti užrašytas skaičius!';
        return false;
    } else {
        return true;
    }
}
function validate_is_positive($field_input, &$field) {
    if ($field_input < 0) {
        $field['error'] = 'Privalo būti teigiamas skaičius!';
        return false;
    } else {
        return true;
    }
}
function validate_max_120($field_input, &$field) {
    if ($field_input > 120) {
        $field['error'] = 'Skaičius turi būti mažesnis, negu 120!';
        return false;
    } else {
        return true;
    }
}
function validate_is_string($field_input, &$field) {
    if (!is_string($field_input)) {
        $field['error'] = 'Užrašykite raides!';
        return false;
    }
    return true;
}
//reg_ex
function validate_is_email($field_input, &$field) {
    if (!filter_var($field_input, FILTER_VALIDATE_EMAIL)) {
        $field['error'] = 'Neteisingas emailo formatas!';
        return false;
    } else {
        return true;
    }
}
function validate_password($field_input, &$field) {
    if (strlen($field_input) < 8) {
        $field['error'] = 'Lauke negali būti mažiau, nei 8 simboliai!';
        return false;
    } else {
        return true;
    }
}
function validate_fields_match($filtered_input, &$form, $params) {
//    var_dump($filtered_input);
    var_dump($params);
    $reference_value = $filtered_input[$params[0]];
    foreach ($params as $field_id) {
        if ($reference_value !== $filtered_input[$field_id]) {
            $form['fields'][$field_id]['error'] = 'Slaptažodžiai nesutampa!';
            return false;
        }
    }
    return true;
}
function validate_email_unique($field_input, &$field) {
    $users_array = file_to_array('data/users.txt');
    if (!empty($users_array)) {
        foreach ($users_array as $user) {
            if ($user['email'] === $field_input) {
                $field['error'] = 'Toks naudotojas yra!';
                return false;
            }
        }
        
        return true;
    }
}
//function validate_email_unique($field_input, &$field) {
//    if (substr(str_shuffle(str_repeat($chars, $length)), 0, $length)) {
//        
//    }
//}