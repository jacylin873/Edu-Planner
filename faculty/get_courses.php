<?php
//Connect to database @Ramses
include("../includes/connect.php");
//Check if POST is full with crn_value @Ramses
if (isset($_POST['crn_value'])) {
    //Save post in variable @Ramses
    $selectedSubject = $_POST['crn_value'];
    //Query courses from course_codes where the subjectShort is equal to that in the post  @Ramses
    $sqlCourses = "SELECT * FROM course_codes WHERE subjectShort = '$selectedSubject'";
    $resultCourses = $conn->query($sqlCourses);
    //Check if there are results @Ramses
    if ($resultCourses->num_rows > 0) {
        echo "<option value='' selected>Select a course</option>";
        //For each matching row, echo into the list the title with a value of the courseFull @Ramses
        while ($row = $resultCourses->fetch_assoc()) {
            echo "<option value='" . $row['courseFull'] . "'>" . $row['title'] . "</option>";
        }
    } else {
        //Echo no courses found into the list if there are no matching courses for the subject @Ramses
        echo "<option value=''>No courses found</option>";
    }
} else {
    //If data in POST not valid, send invalid request message @Ramses
    echo "<option value=''>Invalid request</option>";
}
//Close connection @Ramses
$conn->close();
?>
