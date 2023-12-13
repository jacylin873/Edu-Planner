<?php
//Conntect to database @Ramses
include("../includes/connect.php");
//Check if courseFull value is in the POST request @Ramses
if (isset($_POST['courseFull'])) {
    //Get selected course from POST  @Ramses
    $selectedCourse = $_POST['courseFull'];
    //Query course details from course_codes table where the courseFull column matches selected value  @Ramses
    $sqlCourseDetails = "SELECT * FROM course_codes WHERE courseFull = '$selectedCourse'";
    $resultCourseDetails = $conn->query($sqlCourseDetails);
    //Check if matching course details found @Ramses
    if ($resultCourseDetails->num_rows > 0) {
        //Fetch the row @Ramses
        $row = $resultCourseDetails->fetch_assoc();
        //Create array with the values of the course that matches @Ramses
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
        //Echo array as JSON @Ramses
        echo json_encode($courseDetailsArray);
    } else {
        //Enter message if no course details found @Ramses
        echo "No course details found";
    }
} else {
    //Error message for invalid request @Ramses
    echo "Invalid request";
}
//Close connection @Ramses
$conn->close();
?>

