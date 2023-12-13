<?php
//Include database connection and start session @Ramses
include("../includes/connect.php");
session_start(); 
//Define cookie name and create array @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie exists @Ramses
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user has faculty clearence @Ramses
    if ($user_array['clearance'] == 0)  {
        //Check if request method is POST @Ramses
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Retrieve form data from POST @Ramses
            $subject = $_POST["subject"];
            $header = $_POST["header"];
            $courseNums = $_POST["courseNums"];
            $title = $_POST["title"];
            $credits = $_POST["credits"];
            $attributes = $_POST["attributes"];
            //Make sure user chose to add course @Ramses
            $choice = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_BOOL);
            if (! $choice){
                echo '<script>alert("Make sure you would like to add the course")</script>';
                echo "<script>window.location.href='./addCourseFunction.php';</script>";
                die("Make sure you would like to create the new user");
            }

            //Generate random course number with range from course level chosen to level + 99 @Ramses
            function generateRandomNumber($courseNums) {
                $courseNumsHigh = $courseNums + 99;
                return mt_rand($courseNums, $courseNumsHigh);
            }
            //Check if the course number is unique in the database @Ramses
            function isNumberUnique($number, $conn, $subject) {
                $courseFull = $subject . "" . $number;
                $sql = "SELECT COUNT(*) as count FROM course_codes WHERE courseFull = '$courseFull'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                return $row['count'] == 0;
            }
            //Generate unique course number until it is unique in the database @Ramses
            do {
                $randomNumber = generateRandomNumber($courseNums);
            } while (!isNumberUnique($randomNumber, $conn, $subject));
            //Combine subject with course number to make courseFull value @Ramses
            $courseFull = $subject . "" . $randomNumber;
            //SQL statement to insert values into course_details @Ramses
            $sql = "INSERT INTO course_codes (header, subjectShort, courseNums, courseFull, title, credits, attributes) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                die(mysqli_error($conn));
            }
            //Bind parameters and execute @Ramses
            mysqli_stmt_bind_param($stmt,"ssissis",$header, $subject, $randomNumber, $courseFull, $title , $credits, $attributes);
            mysqli_stmt_execute($stmt);
            //Display success message and redirect @Ramses
            echo '<script>alert("Submission successful")</script>'; 
            mysqli_close($conn);
            echo "<script>window.location.href='./classManage.php';</script>";
            } else {
                //Echo if no course tails founds
                echo "No course details found";
            }
} else {
    //Echo message for invalid request @Ramses
    echo "Invalid request";
    header("Location: classManage.php");
}
}
else{
    //Redirect back to login @Ramses
    header("Location: ../login.php");
    exit();
}
//Destroy session and close database @Ramses
session_destroy();
$conn->close();
?>