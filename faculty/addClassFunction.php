<?php
//Include database connection and start session  @Ramses
include("../includes/connect.php");
session_start();
//Define cookie name and create array for cookie values @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie exists @Ramses
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
   //Check if user is a faculty member @Ramses
    if ($user_array['clearance'] == 1)  {
        //Check if request methodd in POST @Ramses
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Retrieve data from POST @Ramses
            $subject = $_POST["subject"];
            $course = $_POST["course"];
            $sec = $_POST["sec"];
            $instructionalMethod = $_POST["instructional_method"];
            $loc = $_POST["loc"];
            $start_time = $_POST["start_time"];
            $timer = $_POST["timer"];
            $start_day=$_POST["start_day"];
            $start_month=$_POST["start_month"];
            $end_day=$_POST["end_day"];
            $end_month=$_POST["end_month"];
            $available_seats=$_POST["available_seats"];
            $days=$_POST["days"]; 
            //Parse and calculate class length @Ramses
            $timerParts = explode(":", $timer);
            $hours = intval($timerParts[0]);
            $minutes = intval($timerParts[1]);
            $timerInMinutes = $hours * 60 + $minutes;
            //Check user choice and send error message if user selected no @Ramses
            $choice = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_BOOL);
            if (! $choice){
                echo '<script>alert("Make sure you would like to add the class")</script>';
                echo "<script>window.location.href='./addClassFunction.php';</script>";
                die("Make sure you would like to create the new user");
            }
            //Calculate class start and end times @Ramses
            $startDateTime = new DateTime($start_time);
            $interval = new DateInterval("PT{$timerInMinutes}M");
            $endDateTime = clone $startDateTime;
            $endDateTime->add($interval);
            $time = $startDateTime->format("g:i A") . "-" . $endDateTime->format("g:i A");
            //Format the dates @Ramses
            $dates = $start_month . "/" . $start_day . "-" . $end_month . "/" . $end_day;
            //Format instructor input using logged in user @Ramses
            $instructor = $user_array['f_name'] . ' ' . $user_array['l_name'];
            //Query course details from course_codes where courseFull is equal to the selectedCourse var @Ramses
            $selectedCourse = $_POST["course"];
            $sqlCourseDetails = "SELECT * FROM course_codes WHERE courseFull = '$selectedCourse'";
            $resultCourseDetails = $conn->query($sqlCourseDetails);
            //Check if course details are empty @Ramses
            if ($resultCourseDetails->num_rows > 0) {
                //Fetch course details @Ramses
                $row = $resultCourseDetails->fetch_assoc();
                //Create array full of the values returned @Ramses
                $courseDetailsArray = array(
                    'CLID' => $row['CLID'],
                    'header' => $row['header'],
                    'subjectShort' => $row['subjectShort'],
                    'courseNums' => $row['courseNums'],
                    'courseFull' => $row['courseFull'],
                    'title' => $row['title'],
                    'credits' => $row['credits'],
                    'attributes' => $row['attributes']
                );
        //Set variables equal to the array column values @Ramses
        $header = $courseDetailsArray['header'];
        $subjectShort = $courseDetailsArray['subjectShort'];
        $courseNums = $courseDetailsArray['courseNums'];
        $courseFull = $courseDetailsArray['courseFull'];
        $title = $courseDetailsArray['title'];
        $credits = $courseDetailsArray['credits'];
        $attributes = $courseDetailsArray['attributes'];
        //Generate random number for CRN @Ramses
        function generateRandomNumber() {
            return mt_rand(100, 5000);
        }
        //Check if number is unique in the database @Ramses
        function isNumberUnique($number, $conn) {
            $sql = "SELECT COUNT(*) as count FROM courses WHERE CRN = $number";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            return $row['count'] == 0;
        }
        //Generate unique CRN @Ramses
        do {
            $randomNumber = generateRandomNumber();
        } while (!isNumberUnique($randomNumber, $conn));
        //Insert class details into 'courses' table @Ramses
        $sql = "INSERT INTO courses (header, CRN, course, sec, title, instructional_method, credits, dates,days, time, loc, instructor, attributes, available_seats) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            die(mysqli_error($conn));
        }
        //Bind parameters and execute SQL statement @Ramses
        mysqli_stmt_bind_param($stmt,"ssssssisssssss",$header, $randomNumber, $courseFull, $sec , $title, $instructionalMethod, $credits, $dates,$days, $time, $loc, $instructor, $attributes, $available_seats);
        mysqli_stmt_execute($stmt);
        //Display success message  and redirect back to addClasses @Ramses
        echo '<script>alert("Submission successful")</script>'; 
        mysqli_close($conn);
        echo "<script>window.location.href='./addClasses.php';</script>";
            } else {
                //Display error message if no class details found @Ramses
                echo "No course details found";
            }
        } else {
            //Error message @Ramses
            echo "Invalid request";
            header("Location: addClasses.php");
        }
    }
}
else{
    //Redirect to login if no cookie details found @Ramses
    header("Location: ../login.php");
    exit();
}
//Destroy session and close connection to database
session_destroy();
$conn->close();
?>
