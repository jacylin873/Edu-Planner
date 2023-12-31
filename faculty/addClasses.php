<?php
//Include connection @Ramses
include("../includes/connect.php");
//Query all course subjects
$sqlSubjects = "SELECT * FROM course_subjects";
$resultSubjects = $conn->query($sqlSubjects);
//Check if number of subjects greater than 0 @Ramses
if ($resultSubjects->num_rows > 0) {
session_start();
//Define cookie name, check if cookie exists, and unserialize it into array @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if faculty clearence
    if ($user_array['clearance'] == 1)  {
        ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SUNY NP Faculty Home</title>
    <link rel="stylesheet" href="../css/faculty/createClassForm.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        //Function to load courses based on selected subject @Ramses
        function loadCourses() {
            var selectedSubject = $("#subjectDropdown").val();
            $.ajax({
                url: 'get_courses.php', 
                method: 'POST',
                data: { crn_value: selectedSubject },
                success: function (data) {
                    $("#courseDropdown").html(data);
                }
            });
        }
        //Function to get course details for the subject @Ramses
        function getCourseDetails() {
            var selectedCourse = $("#courseDropdown").val();
            $.ajax({
                url: 'getClassDetails.php', 
                method: 'POST',
                data: { courseFull: selectedCourse },
                success: function (data) {
                    console.log(data);
                }
            });
        }
    </script>
</head>
<body>
    <?php require('./navbar.php'); ?>
    <div class="Main-Content">
    <div id="Apply-Div">
        <div class="container"> 
            <div class="title">
                Class Creation Page
            </div>
            <div class="content">
                <!--Call addClassFunction on submission @Ramses -->
                <form action="addClassFunction.php" method="post"> 
                    <div class="user-information">
                        <div class="input-box">
                            <!--PHP to get list of subjects from database @Ramses -->
                            <span for="subjectDropdown" class="user-input" style="display: inline; float: none;">Select Subject:</span>
                                <select class="formDropdown" id="subjectDropdown" name="subject" onchange="loadCourses()" required>
                                <option value="" selected>Select a subject</option>
                                    <?php
                                    while ($row = $resultSubjects->fetch_assoc()) {
                                        echo "<option value='" . $row['crn_value'] . "'>" . $row['subjects'] . "</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                    <!--Dynamic dropdocwn for selecting course from selected subject  @Ramses-->
                    <div class="input-box">
                        <span for="courseDropdown" class="user-input" style="display: inline; float: none;">Select Course: </span>
                        <select class="formDropdown" id="courseDropdown" name="course" required>
                            <option value="" selected>Select a subject</option>
                        </select>
                    </div>
                    <!--Text inout for section of class  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Section</span>
                        <input type="text" placeholder="Enter the section of the class" id="sec" name="sec" required>
                    </div>
                    <!--Dropdown input for instructional method  @Ramses-->
                    <div class="input-box">
                        <span for="instructionalMethodDropdown" class="user-input" style="display: inline; float: none;">Instructional Method:</span>
                        <select class="formDropdown" id="instructionalMethodDropdown" name="instructional_method" required>
                            <option value="">Select an Instructional Method:</option>
                            <option value="AO">Asynchronous Online</option>
                            <option value="CO">Combined Online</option>
                            <option value="FS">Fully Seated</option>
                            <option value="HYFX">HyFlex</option>
                            <option value="HYB">Hybrid</option>
                            <option value="SO">Synchronous Online</option>
                            </select>
                        </select>
                    </div>
                    <!--Text input for class location  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Class Location</span>
                        <input type="text" placeholder="Enter the classroom location" id="loc" name="loc" required>
                    </div>
                    <!--Day input for class days  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Days</span>
                        <select class="formDropdown" id="days" name="days" required>
                            <option value="">Select a start time:</option>
                            <option value="M">M</option>
                            <option value="T">T</option>
                            <option value="W">W</option>
                            <option value="R">R</option>
                            <option value="F">F</option>
                            <option value="S">S</option>
                            <option value="MT">MT</option>
                            <option value="MW">MW</option>
                            <option value="MR">MR</option>
                            <option value="MF">MF</option>
                            <option value="MS">MS</option>
                            <option value="TW">TW</option>
                            <option value="TR">TR</option>
                            <option value="TF">TF</option>
                            <option value="TS">TS</option>
                            <option value="WR">WR</option>
                            <option value="WF">WF</option>
                            <option value="WS">WS</option>
                            <option value="RF">RF</option>
                            <option value="RS">RS</option>
                            <option value="FS">FS</option>
                        </select>
                    </div>   
                    <!--Start time dropdown for class start times  @Ramses-->                
                    <div class="input-box">
                        <span class="user-input">Class Start Time</span>
                        <select class="formDropdown" id="start_time" name="start_time" required>
                            <option value="">Select a start time:</option>
                            <option value="8:00 AM">8:00 AM</option>
                            <option value="8:30 AM">8:30 AM</option>
                            <option value="9:00 AM">9:00 AM</option>
                            <option value="9:30 AM">9:30 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="1:00 PM">1:00 PM</option>
                            <option value="1:30 PM">1:30 PM</option>
                            <option value="2:00 PM">2:00 PM</option>
                            <option value="2:30 PM">2:30 PM</option>
                            <option value="3:00 PM">3:00 PM</option>
                            <option value="3:30 PM">3:30 PM</option>
                            <option value="4:00 PM">4:00 PM</option>
                            <option value="4:30 PM">4:30 PM</option>
                            <option value="5:00 PM">5:00 PM</option>
                            <option value="5:30 PM">5:30 PM</option>
                            <option value="6:00 PM">6:00 PM</option>
                            <option value="6:30 PM">6:30 PM</option>
                            <option value="7:00 PM">7:00 PM</option>
                            <option value="7:30 PM">7:30 PM</option>
                        </select>
                    </div>
                    <!--Class length dropdown  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Class Length</span>
                        <select class="formDropdown" id="timer" name="timer" required>
                            <option value="">Select a class length:</option>
                            <option value="0:15">0:15</option>
                            <option value="0:30">0:30</option>
                            <option value="0:45">0:45</option>
                            <option value="1:00">1:00</option>
                            <option value="1:15">1:15</option>
                            <option value="1:30">1:30</option>
                            <option value="1:45">1:45</option>
                            <option value="2:00">2:00</option>
                            <option value="2:15">2:15</option>
                            <option value="2:30">2:30</option>
                            <option value="2:45">2:45</option>
                            <option value="3:00">3:00</option>
                            <option value="3:15">3:15</option>
                            <option value="3:30">3:30</option>
                            <option value="3:45">3:45</option>
                            <option value="4:00">4:00</option>
                            <option value="4:15">4:15</option>
                            <option value="4:30">4:30</option>
                            <option value="4:45">4:45</option>
                            <option value="5:00">5:00</option>
                            <option value="5:15">5:15</option>
                            <option value="5:30">5:30</option>
                            <option value="5:45">5:45</option>
                            <option value="6:00">6:00</option>
                        </select>
                    </div>
                    <!--Start month dropdown @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Class Start Month</span>
                        <select class="formDropdown" id="start_month" name="start_month" required>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <!-- Start day dropdown  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Class Start Day</span>
                        <select class="formDropdown" id="start_day" name="start_day" required>
                            <?php for ($day = 1; $day <= 31; $day++) { ?>
                                <option value="<?php echo sprintf('%02d', $day); ?>"><?php echo $day; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--End month dropdown  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Class End Month</span>
                        <select class="formDropdown" id="end_month" name="end_month" required>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <!--End day dropdown  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Class End Day</span>
                        <select class="formDropdown" id="end_day" name="end_day" required>
                            <?php for ($day = 1; $day <= 31; $day++) { ?>
                                <option value="<?php echo sprintf('%02d', $day); ?>"><?php echo $day; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--Class size dropdown from 1-120  @Ramses-->
                    <div class="input-box">
                        <span class="user-input">Class Size</span>
                        <select class="formDropdown" id="available_seats" name="available_seats" required>
                            <?php for ($day = 1; $day <= 120; $day++) { ?>
                                <option value="<?php echo sprintf('%02d', $day); ?>"><?php echo $day; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </div>
                    <!--Confirm want to create class @Ramses-->
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
                    <input type="submit" value="Create Class">
                    </div>
            </form>
            </div>
        </div>
      </div>
    </div>
</body>
<?php require('../loggedFooter.php'); ?>
</html>
<?php 
    }
}
else{
    //Redirect to login if not logged in @Ramses
    header("Location: ../login.php");
    exit();
}
?>
<?php
} else {
    //Echo no subjects in table  @Ramses
    echo "No data found in the course_subjects table.";
}

$conn->close();
?>


