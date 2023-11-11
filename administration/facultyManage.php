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
      <meta charset="utf-8">
      <title>SUNY NP Faculty Home</title>
      <link rel="stylesheet" href="../css/userNavbar.css">
   </head>
   <body>
   <?php require('./navbar.php'); ?>

    <div class="Main-Content">
        <h1>Page to manage faculty</h1>
        <h2>Subject dropdown and then search button</h2>
        <h3>Requires we add subject to user_Table, good to have to display student's major anyway</h3>
        <h2>Search button queries the subject value but also makes sure clearence is set to faculty (1)</h2>
        <h2>Have the faculty members be clickable or have a "View" button </h2>
        <h2>View button should bring up faculty member details and a query of all classes they are the professor of </h2>
        <h3>Also allow a dismiss button with a "Are you sure" radio to fire a faculty member and remove from DB</h3>    
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