<?php 
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    

    if ($user_array['clearance'] == (0) | $user_array['clearance'] == (1) | $user_array['clearance'] == (2)  )  {
        
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="">
   </head>
   <body>
   <div class="input-box">
            <span class="user-input" style="display: inline; float: none;">Course</span>
            <select id="course" name="course" class="courses">
                <option value="" selected>Select a subject</option>
                <?php
                include_once("../classes/coursesClass.php");
                $course = new Courses();
                $course->display_Subjects();
                ?>
            </select>
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