<?php

/**
 * Source: https://www.w3schools.com/php/php_form_url_email.asp
 */

function validate_email($string){
    return filter_var($string, FILTER_VALIDATE_EMAIL);
}

function validate_name($string){
    return preg_match("/^[a-zA-Z ]*$/", $string);
}

function validate_alphanumeric($string){
    return preg_match("/^[0-9a-zA-Z ]*$/", $string);
}

function validate_zip($string){
    return strlen($string) == 5 && preg_match("/^[0-9]*$/", $string);
}

function validate_phone_number($string){
    if(empty($string))
        return true;
    return (strlen($string) == 10) && preg_match("/^[0-9]*$/", $string);
}

function validate_number($string){
    return preg_match("/^[0-9]*$/", $string);
}

function validate_address($string){
    return preg_match("/^[0-9a-zA-Z, -]*$/", $string);
}

function validate_time($string){
    return preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $string);
}

function validate_password($string){
    return strlen($string) >= 6;
}

function validate_date($string){
    $date = explode('/', $string);
    if(checkdate($date[0], $date[1], $date[2]))
        return $date;
    return FALSE;
}