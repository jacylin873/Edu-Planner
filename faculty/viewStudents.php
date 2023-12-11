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
   </head>
   <body>
   <?php require('./navbar.php'); ?>
            <div class="Main-Content">
            <h1>Page to view all students </h1>
            <h2>Have list of all students that is in a faculty members classes, make sure to only show once even in multiple classes</h2>
            <h2>Have view button to see all classes student is in that member teaches</h2>    
            <h2>Button to remove the student from certain classes or all classes of that professor</h2>
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