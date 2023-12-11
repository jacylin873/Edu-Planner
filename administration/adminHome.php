<?php 
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    
    // Now, $arrayData contains the original array.

    if ($user_array['clearance'] == 0)  {

        ?>
<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" href="../css/admin/adminHome.css">
      <meta charset="utf-8">
      <title>Admin Page</title>
   </head>
   <body>
   <?php require('./navbar.php'); ?>
    <div class="Main-Content">
        <h1>Hello,  you are an admin user. </h1>
        <h2>You can use this website to create new users, view faculty members and add new courses. </h2>
    </div>       
    <script src="../navbar.js"></script>
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
