<?php

function array_to_file($array, $file_name) {
    $json_string = json_encode($array);
    $file = file_put_contents($file_name, $json_string);
    if ($file !== false) {
        return true;
    } 
        return false;
    }
   
function file_to_array($file) {
    if (file_exists($file)) {
        $encoded_array = file_get_contents($file);
        if ($encoded_array !== false) {
            return json_decode($encoded_array, true);
        }
    }
    
    return false;
}

