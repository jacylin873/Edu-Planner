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
   </head>
   <body>
   <?php require('./navbar.php'); ?>
    <div class="Main-Content">
        <h1>Page to Manage Students</h1> 
        <h2>First and last name fields and then search button</h2>
        <form id="classSearchForm" action="search_results.php" method="post">
            <span class="user-input" style="display: inline; float: none;">Student Search</span>
            <br>
            <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName">
            <br>
            <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName">
            <br>
            <div class="input-box">
                <button type="submit" class="search-button">Search</button>
            </div>
        </form>
        <h2>Queries a list of all students who match the first and last name inputted </h2>     
        <h2>Make user clickable / have "View" button next to them</h2>
        <h2>Show the user info and the option to remove student with radio button prompt of are you sure </h2>
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