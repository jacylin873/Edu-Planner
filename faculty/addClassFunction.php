<?php
include("../includes/connect.php");
session_start(); 
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    if ($user_array['clearance'] == 1)  {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $days=$_POST["days"]; 
    $end_month=$_POST["end_month"];
    $available_seats=$_POST["available_seats"];
    $timerParts = explode(":", $timer);
    $hours = intval($timerParts[0]);
    $minutes = intval($timerParts[1]);
    $timerInMinutes = $hours * 60 + $minutes;
    $choice = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_BOOL);
    if (! $choice){
        echo '<script>alert("Make sure you would like to add the class")</script>';
        echo "<script>window.location.href='./addClassFunction.php';</script>";
        die("Make sure you would like to create the new user");
    }
    $startDateTime = new DateTime($start_time);
    $interval = new DateInterval("PT{$timerInMinutes}M");
    $endDateTime = clone $startDateTime;
    $endDateTime->add($interval);
    $time = $startDateTime->format("g:i A") . "-" . $endDateTime->format("g:i A");

    $dates = $start_month . "/" . $start_day . "-" . $end_month . "/" . $end_day;
    $instructor = $user_array['f_name'] . ' ' . $user_array['l_name'];
    $selectedCourse = $_POST["course"];
    $sqlCourseDetails = "SELECT * FROM course_codes WHERE courseFull = '$selectedCourse'";
    $resultCourseDetails = $conn->query($sqlCourseDetails);
    if ($resultCourseDetails->num_rows > 0) {
        $row = $resultCourseDetails->fetch_assoc();
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

$header = $courseDetailsArray['header'];
$subjectShort = $courseDetailsArray['subjectShort'];
$courseNums = $courseDetailsArray['courseNums'];
$courseFull = $courseDetailsArray['courseFull'];
$title = $courseDetailsArray['title'];
$credits = $courseDetailsArray['credits'];
$attributes = $courseDetailsArray['attributes'];

function generateRandomNumber() {
    return mt_rand(100, 5000);
}
function isNumberUnique($number, $conn) {
    $sql = "SELECT COUNT(*) as count FROM courses WHERE CRN = $number";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'] == 0;
}
do {
    $randomNumber = generateRandomNumber();
} while (!isNumberUnique($randomNumber, $conn));
$sql = "INSERT INTO courses (header, CRN, course, sec, title, instructional_method, credits, dates,days, time, loc, instructor, attributes, available_seats) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"ssssssisssssss",$header, $randomNumber, $courseFull, $sec , $title, $instructionalMethod, $credits, $dates,$days, $time, $loc, $instructor, $attributes, $available_seats);
mysqli_stmt_execute($stmt);
echo '<script>alert("Submission successful")</script>'; 
mysqli_close($conn);
echo "<script>window.location.href='./addClasses.php';</script>";
    } else {
        echo "No course details found";
    }
} else {
    echo "Invalid request";
    header("Location: addClasses.php");
}
}
}
else{
    header("Location: ../login.php");
    exit();
}
session_destroy();
$conn->close();
?>
