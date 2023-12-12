
<?php
//Database connect @Ramses

include("../includes/connect.php");
//Check if 'class' is in POST request @Ramses
if (isset($_POST['class'])) {
    //Save POST data to variable @Ramses
    $selectedClass = $_POST['class'];
    //SQL query to return courses with matching title and avilable seats @Ramses
    $sql = "SELECT * FROM courses WHERE title = ? AND available_seats > 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedClass);
    $stmt->execute();
    $result = $stmt->get_result();
    //Make array for search results @Ramses
    $searchResults = array();
    //Fetch each row and add to the array @Ramses
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
    $stmt->close();
    //Echo JSON search results array @Ramses
    echo json_encode($searchResults);
}
//Close database connection @Ramses
$conn->close();
?>
