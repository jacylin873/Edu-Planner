<?php
include("../includes/connect.php");
if (isset($_POST['course'])) {
    $selectedCourse = $_POST['course'];
    $sql = "SELECT DISTINCT title FROM courses WHERE LEFT(course, 3) = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedCourse);
    $stmt->execute();
    $result = $stmt->get_result();
    $classes = array();
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row['title'];
    }
    $stmt->close();
    echo json_encode($classes);
}
$conn->close();
?>

