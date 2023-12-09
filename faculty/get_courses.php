<?php
include("../includes/connect.php");
if (isset($_POST['crn_value'])) {
    $selectedSubject = $_POST['crn_value'];
    $sqlCourses = "SELECT * FROM course_codes WHERE subjectShort = '$selectedSubject'";
    $resultCourses = $conn->query($sqlCourses);
    if ($resultCourses->num_rows > 0) {
        echo "<option value='' selected>Select a course</option>";
        while ($row = $resultCourses->fetch_assoc()) {
            echo "<option value='" . $row['courseFull'] . "'>" . $row['title'] . "</option>";
        }
    } else {
        echo "<option value=''>No courses found</option>";
    }
} else {
    echo "<option value=''>Invalid request</option>";
}

$conn->close();
?>
