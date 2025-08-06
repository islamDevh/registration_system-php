<?php

declare(strict_types=1);

// check Request
function checkRequest($method)
{
    if ($_SERVER['REQUEST_METHOD'] === $method) {
        return true;
    }
    return false;
}

//checkPost input
function checkPostInput($input)
{
    if (isset($_POST[$input])) {
        return true;
    }
    return false;
}
//sanitize input
function val_sanitize($value)
{
    $value = trim(htmlspecialchars(htmlentities($value)));
    return $value;
}
// function hash_password($value){
//   $password =  password_hash($value, PASSWORD_DEFAULT);
// }

// get_defined_vars()['i']  -> number of variables inserted into func
// function val_sanitize_many(...$values){
//     $sanitizedData = [];
//     for($i=0; $i< count($values); $i++){
//         $sanitizedData[] = val_sanitize($values[$i]);
//     }

//     return $sanitizedData;
// }

function val_required($input)
{
    if (!empty($input)) {
        return true;
    }
    return false;
}

function val_min($input, $min)
{
    if (strlen($input) > $min) {
        return true;
    }
    return false;
}

function val_max($value, $max)
{
    if (strlen($value) < $max) {
        return true;
    }
    return false;
}

function val_minAndMax(string $value, int $min, int $max): bool
{
    if (strlen($value) > $min && strlen($value) < $max) {
        return true;
    }
    return false;
}

function val_email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //phpمن المانيوال filterوممكن اكتب رقم ال
        return true;
    }
    return false;
}

function val_integer($number)
{
    if (is_int($number)) {
        return true;
    }
    return false;
}


function val_float($number)
{
    if (is_float($number)) {
        return true;
    }
    return false;
}


function val_numeric($value)
{
    if (is_numeric($value)) {
        return true;
    }
    return false;
}


// number between
function val_numBet($num, $smaller, $greater)
{
    // echo "<pre>";
    // print_r(get_defined_vars());
    // echo "</pre>";die;
    if (!($num < $smaller || $num > $greater)) {
        return true;
    }
    return false;
}

function val_string_int(string $string): bool
{
    /**
     * $	assert end of subject or before a terminating newline (or end of line, in multiline mode)
     * 
     * +	1 or more quantifier
     * +	equivalent to {1,}
     */
    if (preg_match("/[a-z A-Z ,0-9]+$/", $string)) {
        return true;
    }
    return false;
}
function val_string(string $string): bool
{
    /**
     * $	assert end of subject or before a terminating newline (or end of line, in multiline mode)
     * 
     * +	1 or more quantifier
     * +	equivalent to {1,}
     */
    //
    if (preg_match("/[a-z A-Z أ-ي]+$/", $string)) {
        return true;
    }
    return false;
}
function redirect($path)
{
    header("location:$path");
}
