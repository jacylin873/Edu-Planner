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
                <h1>Page to view all professors</h1>   
                <h2>List all professors that student is currently enrolled in classes of</h2> 
                <h2>View button next to the professor which pops up to show which classes of the teacher enrolled in </h2>
                
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
