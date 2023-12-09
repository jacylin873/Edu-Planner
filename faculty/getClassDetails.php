<?php
include("../includes/connect.php");
if (isset($_POST['courseFull'])) {
    $selectedCourse = $_POST['courseFull'];
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
        echo json_encode($courseDetailsArray);
    } else {
        echo "No course details found";
    }
} else {
    echo "Invalid request";
}
$conn->close();
?>

