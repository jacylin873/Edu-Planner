<?php
include("../includes/connect.php");
$sqlSubjects = "SELECT * FROM course_subjects";
$resultSubjects = $conn->query($sqlSubjects);
if ($resultSubjects->num_rows > 0) {
?>
<?php 
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    if ($user_array['clearance'] == 0)  {
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Faculty Home</title>
      <link rel="stylesheet" href="../css/admin/createClassForm.css">
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <link rel="stylesheet" href="../css/admin/facultyManage.css">
   </head>
   <body>
   <?php require('./navbar.php'); ?>

    <div class="Main-Content">
        <div id="Apply-Div">
            <div class="container"> 
            <div class="title">
                Faculty Member Search
            </div>
            <div class="content">
                <form action="facultyManageFunction.php" method="post"> 
                <div class="user-information">
                    <div class="input-box search-by-name" id="f_name">
                         <span for="f_name" class="user-input">First Name:</span>
                         <input type="text" placeholder="Enter the faculty member's first name" id="f_name" name="f_name" required>
                    </div>
                    
                    <div class="input-box search-by-name" id="l_name">
                        <span for="l_name" class="user-input">Last Name:</span>
                        <input type="text" placeholder="Enter the faculty member's last name" id="l_name" name="l_name" required>
                    </div>

                </div>
                <div class="button">
                    <input type="submit" value="View">
                </div>
                </form>
            </div>
            </div>


        </div>
        <div class="Table-Content">
            <div id="result"></div>
        </div>
    <script>
        $('form').submit(function (event) {
            event.preventDefault(); 

            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'facultyManageFunction.php',
                data: formData,
                success: function (response) {

                    $('#result').html(response);
                },
                error: function () {
                    alert('An error occurred during the AJAX request.');
                }
            });
        });
    </script>

    
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
<?php
} else {
    echo "No data found in the course_subjects table.";
}

$conn->close();
?>