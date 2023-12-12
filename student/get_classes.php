<?php
//Connect to the database @Ramses
include("../includes/connect.php");
//Check if 'course' paramater is in POST request @Ramses
if (isset($_POST['course'])) {
    //Save selected course value to variale @Ramses
    $selectedCourse = $_POST['course'];
    //SQL query for distinct titles of courses ased on the first 3 left letters of the course code are equal to the course in the post request @Ramses
    $sql = "SELECT DISTINCT title FROM courses WHERE LEFT(course, 3) = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedCourse);
    $stmt->execute();
    $result = $stmt->get_result();
    $classes = array();
    //Fetch each rw and store the title in an array @Ramses
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row['title'];
    }
    $stmt->close();
    //Encode the array as JSON and echo it @Ramses
    echo json_encode($classes);
}
//Close database connection @Ramses
$conn->close();
?>

