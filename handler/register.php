<?php
session_start();
require '../core/db.php';             //database
require '../core/validations.php';    //validations
if ( checkReqouest("POST") && checkPostInput('submit')) {
//sanitaize inputs
    foreach ($_POST as $key => $value){
        $$key = val_sanitize($value); 
    }
//validations inputs
// name : required | min:3 | max:20 | regex(string+nums)
$errors = [];
if (!val_required($name)) {
    $errors[] = "name is required";
}
elseif (!val_minAndMax($name, 3, 20)) {
    $errors[] = "name must be between 3 and 20 chars";
} 
elseif (!val_string($name)) {
    $errors[] = "enter valid name";
}
//email : required | emailFormat | 
if (!val_required($email)) {
    $errors[] = "Email is required";
} elseif (!val_max($email, 50)) {
    $errors[] = "Email is too long";
} elseif (!val_email($email)) {
    $errors[] = "Email format is not valid";
}

//mobile : required | string+symbols[ '(', ')', '+' ] | min:9 | max:20
if (!val_required($mobile)) {
    $errors[] = "mobile is required";

}
elseif (!preg_match('/^[0-9]{' . 9 . ',' . 20 . '}\z/', $mobile)) {    //between 9 and 20
    $errors[] = "mobile format is not valid";
}
//password : required | shoud be more than 5 chars | 
if (!val_required($password)) {
    $errors[] = "password is required";
}else {
  $password_hash =  password_hash($password, PASSWORD_DEFAULT);
}
// if $errors is empty redirect back and print data in card
// else redirect back and print errors via session
    if (!empty($errors)) {
        // may be passed as $key=>$value
        $_SESSION['success'] = [$name, $email, $mobile,$password];
    } 
    else {
        $_SESSION['errors'] = $errors;
    }
//insert database
$query = "INSERT INTO users(`name`, `email`, `mobile`, `password`) VALUES ('$name', '$email', '$mobile', '$password_hash');"; //المتغير دا tableبتاعة ال nameخزنلي في خانة ال
$result = mysqli_query($conn,$query);
if ($result){  //
   $_SESSION['sucsses_insert'] = "data inserted";  
   redirect("../register.php");
}else {
    $_SESSION['errors'] = $errors;
    redirect("../register.php");
}
//End incert query 
}