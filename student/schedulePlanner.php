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
                <h1>Page to enroll in classes</h1>   
                <h2>Form which has database of all the classes offered</h2> 
                <h2>Dropdown of subjects which when option selected triggers javascript to call query for dropdown with all classes being offered</h2>
                <h2>Must check to see if student is enrolled in a class during that time and send error if is</h2>
                <h2>If no errors set, add class to array of classes</h2>
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