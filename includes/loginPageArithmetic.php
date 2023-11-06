<?php
session_start(); 
//Connects to the database.
include("connect.php");
//checks if $_POST varibles already exist or Cookie exists
if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
//Sanitizes the user information submitted before sending into database
    function check($form_info){
        $form_info = trim($form_info);
        $form_info = stripslashes($form_info);
        $form_info = htmlspecialchars($form_info);
        return $form_info;
     }
//Sanitizes the submitted email
    $user_email = check($_POST['user_email']);
//Sanitizes the submitted password
    $password = check($_POST['user_password']);
//Generates error message if email field is empty
    if (empty($user_email)) {
        header("Location: ../login.php?error=Email is required");
        exit();
    } 
//Generates error message if password field is empty
    else if(empty($password)){
        header("Location: ../login.php?error=Password is required");
        exit();
    } 
//Continue if the passowrd field and email field are empty    
    else{
        include_once("../classes/userClass.php");
        $user = new User();
        $user->login_User($user_email, $password);
}
}
//Sends user back to login page
else{
    header("Location: ../login.php");
    exit();
}