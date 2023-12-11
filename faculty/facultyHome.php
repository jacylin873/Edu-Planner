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
                <h1>Hello,  faculty member! Here is where you can view all your classes and sign up to instruct new classes.</h1>    
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
