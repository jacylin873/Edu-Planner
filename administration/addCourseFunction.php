<?php
include("../includes/connect.php");
session_start(); 
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    if ($user_array['clearance'] == 0)  {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST["subject"];
    $header = $_POST["header"];
    $courseNums = $_POST["courseNums"];
    $title = $_POST["title"];
    $credits = $_POST["credits"];
    $attributes = $_POST["attributes"];
    
    $choice = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_BOOL);
    if (! $choice){
        echo '<script>alert("Make sure you would like to add the course")</script>';
        echo "<script>window.location.href='./addCourseFunction.php';</script>";
        die("Make sure you would like to create the new user");
    }


    function generateRandomNumber($courseNums) {
        $courseNumsHigh = $courseNums + 100;
        return mt_rand($courseNums, $courseNumsHigh);
    }
    function isNumberUnique($number, $conn, $subject) {
        $courseFull = $subject . "" . $number;
        $sql = "SELECT COUNT(*) as count FROM course_codes WHERE courseFull = '$courseFull'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'] == 0;
    }

    do {
        $randomNumber = generateRandomNumber($courseNums);
    } while (!isNumberUnique($randomNumber, $conn, $subject));

    $courseFull = $subject . "" . $randomNumber;

$sql = "INSERT INTO course_codes (header, subjectShort, courseNums, courseFull, title, credits, attributes) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"ssissis",$header, $subject, $randomNumber, $courseFull, $title , $credits, $attributes);
mysqli_stmt_execute($stmt);


echo '<script>alert("Submission successful")</script>'; 

mysqli_close($conn);
echo "<script>window.location.href='./classManage.php';</script>";
    } else {
        echo "No course details found";
    }
} else {
    echo "Invalid request";
    header("Location: classManage.php");
}
}

else{
    header("Location: ../login.php");
    exit();
}
session_destroy();
$conn->close();
?>