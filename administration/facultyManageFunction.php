<?php
include("../includes/connect.php");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    function sanitizeInput($input) {
        return $input;
    }
    function searchByName($firstName, $lastName) {
        global $conn;
        $firstName = sanitizeInput($firstName);
        $lastName = sanitizeInput($lastName);
        $sql = "SELECT f_name, l_name, phone_num FROM user_profile WHERE f_name = '$firstName' AND l_name = '$lastName' AND clearance = 1";
        $result = $conn->query($sql);
        $output = "<table border='1'><tr><th>Name</th><th>Phone Number</th></tr>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output .= "<tr><td>" . $row["f_name"] . " " . $row["l_name"] . "</td><td>" . $row["phone_num"] . "</td></tr>";
            }
            $output .= "</table>";
        } else {
            $output = "No matching records found.";
        }
        return $output;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST["f_name"];
        $lastName = $_POST["l_name"];
        echo searchByName($firstName, $lastName);
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

