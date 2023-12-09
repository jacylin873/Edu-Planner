
<?php
include("../includes/connect.php");
if (isset($_POST['class'])) {
    $selectedClass = $_POST['class'];
    $sql = "SELECT * FROM courses WHERE title = ? AND available_seats > 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedClass);
    $stmt->execute();
    $result = $stmt->get_result();
    $searchResults = array();
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
    $stmt->close();
    echo json_encode($searchResults);
}
$conn->close();
?>
