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
        <h1>Page to manage classes</h1>
        <h2>Have dropdown of different subjects and search button</h2>
        <h3>Add tab options to search by CRN & add ability to search by class code </h3>
        <form id="classSearchForm" action="search_results.php" method="post">
            <span class="user-input" style="display: inline; float: none;">Class Search</span>
            <div class="input-box">
            <?php require('../courseDropdown.php'); ?>
            </div>
            
            <div class="input-box">
                <button type="submit" class="search-button">Search</button>
            </div>
        </form>

        <h2>Display all available classes returned from each query</h2>
        <h2>Let class be clickable / make a view button<h2>
        <h2>View button should bring specific class to foreground with list of students in that class<h2>
        <h2>X button next to each student to remove them from the class</h2>
        <h2></h2>
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