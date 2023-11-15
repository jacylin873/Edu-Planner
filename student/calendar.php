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
                <h1>Page to student class calendar</h1>   
                <h2>Monday-Friday 8AM-8PM Classes</h2> 
                
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