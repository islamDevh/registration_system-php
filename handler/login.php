<?php
session_start();
require_once __DIR__ . '/../bootstrap.php';

// require '../core/db.php';             //database
require '../core/validations.php';    //validations
if (checkRequest("POST") && checkPostInput('submit')) {
    dd($_POST);
    //validations => Email/password
    $email = val_sanitize($_POST['email']);
    $password = val_sanitize($_POST['password']);
    $errors = [];

    //email : required | emailFormat | 
    if (!val_required($email)) {
        $errors[] = "Email is required";
    } elseif (!val_email($email)) {
        $errors[] = "Email format is not valid";
    }
    //password : required |  

    // if (!val_required($password)) {
    //     $errors[] = "password is required";
    // } elseif (password_verify($password,$password_hash)) {
    //     echo "done";
    //     die;
    // }

    // if $errors is empty redirect back and print data in card
    // else redirect back and print errors via session
    if (!empty($errors)) {
        // may be passed as $key=>$value
        $_SESSION['success'] = [$email, $password];
    } else {
        $_SESSION['errors'] = $errors;
    }
    //check if Email of user is exist or not
    $query = "SELECT * from users where email='$email' and password='$password'"; //select query
    $result = mysqli_query($conn, $query); //تنفيذ الكويري
    if (mysqli_num_rows($result) != 0)  //if data exist in row at database
    {
        $row = mysqli_fetch_assoc($result); // 

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_mobile'] = $row['mobile'];
        $_SESSION['user_password'] = $row['password'];
        header("location:../index.php");
    } else {
        $_SESSION['errorr'] = "email or password is not correct";
        print_r($_SESSION['errorr']);
    }
}
