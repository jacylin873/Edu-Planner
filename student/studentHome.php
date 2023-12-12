<?php 
//Start session @Ramses
session_start();
//Set cookie name and create user array @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie is set
if (isset($_COOKIE[$cookie_name])) {
    //Unserialize cookie data and save to array @Ramses
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user clearence is student @Ramses
    if ($user_array['clearance'] == 2)  {

        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Student Home</title>
   </head>
   <body>
   <?php require('./navbar.php'); ?>
            <div class="Main-Content">
                <h1>Welcome, student! Here is where you can view your schedule and add new classes to your schedule.</h1>    
            </div>
    </body>
    <?php require('../loggedFooter.php'); ?>
        </html>
        <?php 
    }
}
else{
    //Redirect to login if user data not set @Ramses
    header("Location: ../login.php");
    exit();
}
?>