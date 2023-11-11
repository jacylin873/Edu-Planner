<?php 
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    if ($user_array['clearance'] == 1)  {
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
            <h1>Page to view user information </h1>
            <h2>Have list of different user information with an edit button next to the fields</h2>
            <h2>Upon clicking edit button, open up a field to edit the section of user info</h2>    
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