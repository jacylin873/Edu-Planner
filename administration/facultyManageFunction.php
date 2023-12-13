<?php
//Connect to database @Ramses
include("../includes/connect.php");
//Check if request is Ajax requst @Ramses
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    //Sanitize user input @Ramses
    function sanitizeInput($conn,$input) {
        return mysqli_real_escape_string($conn, $input);
    }
    //Function for search by name in user_profile given first and last name @Ramses
    function searchByName($firstName, $lastName) {
        global $conn;
        //Sanitize first name and last name
        $firstName = sanitizeInput($conn,$firstName);
        $lastName = sanitizeInput($conn,$lastName);
        $sql = "SELECT f_name, l_name, phone_num FROM user_profile WHERE f_name = '$firstName' AND l_name = '$lastName' AND clearance = 1";
        $result = $conn->query($sql);
        $output = "<table border='1'><tr><th>Name</th><th>Phone Number</th></tr>";
        //Check if there are matching rows @Ramses
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //Output name and phone number as rows @Ramses for the table
                $output .= "<tr><td>" . $row["f_name"] . " " . $row["l_name"] . "</td><td>" . $row["phone_num"] . "</td></tr>";
            }
            //Output table
            $output .= "</table>";
        } else {
            $output = "No matching records found.";
        }
        return $output;
    }
    //Check if request is a post request @Ramses
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST["f_name"];
        $lastName = $_POST["l_name"];
        //Call searchByName function
        echo searchByName($firstName, $lastName);
    }
} else {
    //Invalid request error @Ramses
    echo "Invalid request.";
}
//Close database @Ramses
$conn->close();
?>

