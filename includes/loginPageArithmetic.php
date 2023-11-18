<?php
session_start();


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
    $user_password = check($_POST['user_password']);
//Generates error message if email field is empty
    if (empty($user_email)) {
        header("Location: ../login.php?error=Email is required");
        exit();
    }
//Generates error message if password field is empty
    else if(empty($user_password)){
        header("Location: ../login.php?error=Password is required");
        exit();
    }
//Continue if the password field and email field are empty    
    else{
        //Call user class
        include_once("../classes/userClass.php");
        //Create new user object
        $user = new User();
        //Call login_User method to check if user exists in database
        $user->login_User($user_email, $user_password);
}
}
//Sends user back to login page
else{
    header("Location: ../login.php");
    exit();
}



