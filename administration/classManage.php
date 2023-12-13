<?php
//Include database connection @Ramses
include("../includes/connect.php");
//Query subjects from database @Ramses
$sqlSubjects = "SELECT * FROM course_subjects";
$resultSubjects = $conn->query($sqlSubjects);
//Check if there are subjects @Ramses
if ($resultSubjects->num_rows > 0) {
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if user is logged in @Ramses
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    //Unserialize cookie data and store in array @Ramses
    $user_array = unserialize($serializedData);
    //Check if user is faculty @Ramses
    if ($user_array['clearance'] == 0)  {
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Manage Courses</title>
      <link rel="stylesheet" href="../css/admin/createClassForm.css">
   </head>
   <body>
   <?php require('./navbar.php'); ?>

    <div class="Main-Content">
        <div id="Apply-Div">
        <div class="container"> 
            <div class="title">
                Course Creation Page
            </div>
            <div class="content">
                <form action="addCourseFunction.php" method="post"> 
                    <div class="user-information">
                        <div class="input-box">
                            <span for="subjectDropdown" class="user-input" style="display: inline; float: none;">Select Subject:</span>
                                <select class="formDropdown" id="subjectDropdown" name="subject" onchange="loadCourses()" required>
                                <option value="" selected>Select a subject</option>
                                    <?php
                                    //Display subjects in a dropdown @Ramses
                                    while ($row = $resultSubjects->fetch_assoc()) {
                                        echo "<option value='" . $row['crn_value'] . "'>" . $row['subjects'] . "</option>";
                                    }
                                    ?>
                                </select>
                        </div>

                    <!--Dropdown for whether course is for undergraduate or graduate students  @Ramses-->
                    <div class="input-box">
                        <span for="header" class="user-input" style="display: inline; float: none;">Select wheter undergaduate or graduate:</span>
                        <select class="formDropdown" id="header" name="header" required>
                            <option value="">Select undergraduate or graduate:</option>
                            <option value="Undergraduate Courses">Undergraduate Courses</option>
                            <option value="Graduate Courses">Graduate Courses</option>
                            </select>
                        </select>
                    </div>
                    <!--Dropdown for course level  @Ramses-->
                    <div class="input-box">
                        <span for="courseNums" class="user-input" style="display: inline; float: none;">Select course level:</span>
                        <select class="formDropdown" id="courseNums" name="courseNums" required>
                            <option value="">Select course level:</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                            </select>
                        </select>
                    </div>
                    <!--Input for course title  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Title</span>
                        <input type="text" placeholder="Enter the title of the class" id="title" name="title" required>
                    </div>
                    <!--Dropdown for amount of credits a class is  @Ramses-->
                    <div class="input-box">
                        <span for="credits" class="user-input" style="display: inline; float: none;">Credit Amount:</span>
                        <select class="formDropdown" id="credits" name="credits" required>
                            <option value="">Select credit amount:</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            </select>
                        </select>
                    </div>
                    <!--Input of attributes for the course @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Attributes</span>
                        <input type="text" placeholder="Enter the attributes of the class" id="attributes" name="attributes" required>
                    </div>
                    </div>
                    <!--Button to choose if sure want to create new class  @Ramses-->
                    <div class="choice-user-input">
                        <input type="radio" name="choice" id="dot-1" value="true" required>
                        <input type="radio" name="choice" id="dot-2" value="false" checked="checked">
                        <span class="choice-title">Are you, <?php echo $user_array['f_name'] . ' ' . $user_array['l_name']; ?> sure you want to create this new class?</span>
                        <div class="category">
                                <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="choice">Yes</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="choice">No</span>
                        </label>
                        </div>
                    </div>
                    <!--Button for submission  @Ramses-->
                    <div class="button">
                    <input type="submit" value="Create">
                    </div>
            </form>
            </div>
        </div>
      </div>
    </div>
    </div>
           
    
    
    <script src="../navbar.js"></script>
    </body>
    <?php require('../loggedFooter.php'); ?>
        </html>
        <?php 
    }
}
else{
    //Send user back to login if not faculty @Ramses
    header("Location: ../login.php");
    exit();
}
?>
<?php
} else {
    //Echo message if no data found in course_subjects table @Ramses
    echo "No data found in the course_subjects table.";
}

$conn->close();
?>