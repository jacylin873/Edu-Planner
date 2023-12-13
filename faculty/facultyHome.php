<?php 
//Start session @Ramses
session_start();
//Define cookie name and make array @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie is set @Ramses
if (isset($_COOKIE[$cookie_name])) {
    //Unserialize the cookie and save into array @Ramses
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user is faculty @Ramses
    if ($user_array['clearance'] == 1)  {
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Faculty Home</title>
   </head>
   <body>
        <?php require('./navbar.php'); ?>
            <div class="Main-Content">
                <h1>Hello,  faculty member! Here is where you can view all your classes and sign up to instruct new classes.</h1>    
            </div>
    </body>
    <?php require('../loggedFooter.php'); ?>
</html>
        <?php 
    }
}
else{
    //If cookie doesn't exist, go back to login
    header("Location: ../login.php");
    exit();
}
?>
