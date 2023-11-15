<?php 
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    

    if ($user_array['clearance'] == 2)  {

        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Faculty Home</title>
      <link rel="stylesheet" href="../css/userNavbar.css">
   </head>
   <body>
   <?php require('./navbar.php'); ?>
            <div class="Main-Content">
                <h1>Page to view student profile</h1>   
                <h2>List all student information from the table</h2> 
                <h2>Add edit button next to user information which bring up field to submit change to information </h2>
                <h2>Unenroll button that deletes user from system</h2>
            </div>
    </body>
        </html>
        <?php 
    }
}
else{
    header("Location: ../login.php");
    exit();
}
?>