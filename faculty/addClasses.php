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
                <form action="addClassFunction.php" method="post"> 
                    <div class="user-information">
                        <div class="input-box">
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
                    <div class="input-box">
                        <span for="courseDropdown" class="user-input" style="display: inline; float: none;">Select Course: </span>
                        <select class="formDropdown" id="courseDropdown" name="course" required>
                            <option value="" selected>Select a subject</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="user-input">Section</span>
                        <input type="text" placeholder="Enter the section of the class" id="sec" name="sec" required>
                    </div>
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
                    <div class="input-box">
                        <span class="user-input">Class Location</span>
                        <input type="text" placeholder="Enter the classroom location" id="loc" name="loc" required>
                    </div>
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
                    <div class="input-box">
                        <span class="user-input">Class Start Day</span>
                        <select class="formDropdown" id="start_day" name="start_day" required>
                            <?php for ($day = 1; $day <= 31; $day++) { ?>
                                <option value="<?php echo sprintf('%02d', $day); ?>"><?php echo $day; ?></option>
                            <?php } ?>
                        </select>
                    </div>
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
                    <div class="input-box">
                        <span class="user-input">Class Start Day</span>
                        <select class="formDropdown" id="end_day" name="end_day" required>
                            <?php for ($day = 1; $day <= 31; $day++) { ?>
                                <option value="<?php echo sprintf('%02d', $day); ?>"><?php echo $day; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="user-input">Class Size</span>
                        <select class="formDropdown" id="available_seats" name="available_seats" required>
                            <?php for ($day = 1; $day <= 120; $day++) { ?>
                                <option value="<?php echo sprintf('%02d', $day); ?>"><?php echo $day; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </div>
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
                    <div class="button">
                    <input type="submit" value="Register">
                    </div>
            </form>
            </div>
        </div>
      </div>
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
<?php
} else {
    echo "No data found in the course_subjects table.";
}

$conn->close();
?>


