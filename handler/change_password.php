<?php
session_start();
require '../core/db.php';             //database
require '../core/validations.php';    //validations
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
//validations/Email/password
    $current_password = val_sanitize($_POST['current_password']);
    $new_password= val_sanitize($_POST['new_password']);
    $confirm_password = val_sanitize($_POST['confirm_password']);
    $errors = [];
// if $errors is empty redirect back and print data in card
// else redirect back and print errors via session
    if (!empty($errors)) {
        // may be passed as $key=>$value
        $_SESSION['success'] = [$password,$new_password,$confirm_password];
    } 
    else {
        $_SESSION['errors'] = $errors;
    }
//check if Email of user is exist or not
$query =   $sql = "SELECT password FROM users WHERE id='$id' AND password='$op'"; //select query
$result = mysqli_query($conn,$query); 
if (mysqli_num_rows($result) != 0)  //if data exist in row at database
{
    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_mobile'] = $row['mobile'];
    $_SESSION['user_password'] = $row['password'];
    header("location:../index.php");
}else{
    $_SESSION['errorr'] = "email or password is not correct";
    print_r($_SESSION['errorr']);
}
}
