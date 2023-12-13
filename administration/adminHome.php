<?php
//Include database connection and start session @Ramses
include("../includes/connect.php");
session_start(); 
//Define cookie name and create array @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie exists @Ramses
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user has faculty clearence @Ramses
    if ($user_array['clearance'] == 0)  {
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Admin Home</title>
   </head>
   <body>
   <?php require('./navbar.php'); ?>
    <div class="Main-Content">
        <h1>Hello,  you are an admin user. You can use this website to create new users, view faculty members and add new courses.</h1>    
    </div>
           
    <!--Include navbar @Ramses-->
    <script src="../navbar.js"></script>
    </body>
    <?php require('../loggedFooter.php'); ?>
        </html>
        <?php 
    }
}
else{
    header("Location: ../login.php");
    exit();
}
?>
