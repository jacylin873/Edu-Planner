<?php
//Include database connection and start session  @Ramses
include("../includes/connect.php");
session_start();
//Define cookie name and create array for cookie values @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie exists @Ramses
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
   //Check if user is a faculty member @Ramses
    if ($user_array['clearance'] == 1)  {
         //Get instructor's full name @Ramses
        $instructorName = $user_array['f_name'] . ' ' . $user_array['l_name'];
        //Retrieve all classes where instructor is equal to user's full name @Ramses
        $sql = "SELECT * FROM courses WHERE instructor = '$instructorName'";
        $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Faculty Home</title>
      <link rel="stylesheet" href="../css/faculty/viewClasses.css">
   </head>
   <body>
      <?php require('./navbar.php'); ?>
      <div class="Main-Content">

         <?php
         //Check if there are courses found for the instructor @Ramses
            if ($result->num_rows > 0) {
               echo "<table border='1'>
                        <tr>
                           <th>CRN</th>
                           <th>Course</th>
                           <th>Title</th>
                           <th>Instructional Method</th>
                           <th>Credits</th>
                           <th>Dates</th>
                           <th>Days</th>
                           <th>Time</th>
                           <th>Location</th>
                           <th>Attributes</th>
                           <th>Available Seats</th>
                        </tr>";

               while ($row = $result->fetch_assoc()) {
                  //Display course information in a table @Ramses
                  echo "<tr>
                           <td>" . $row['CRN'] . "</td>
                           <td>" . $row['course'] . "</td>
                           <td>" . $row['title'] . "</td>
                           <td>" . $row['instructional_method'] . "</td>
                           <td>" . $row['credits'] . "</td>
                           <td>" . $row['dates'] . "</td>
                           <td>" . $row['days'] . "</td>
                           <td>" . $row['time'] . "</td>
                           <td>" . $row['loc'] . "</td>
                           <td>" . $row['attributes'] . "</td>
                           <td>" . $row['available_seats'] . "</td>
                        </tr>";
               }

               echo "</table>";
            } else {
               //Display message if no courses found for instructor @Ramses
               echo "No courses found for the instructor.";
            }
         ?>
      </div>
   </body>
   <?php require('../loggedFooter.php'); ?>
</html>

<?php
    } else {
         //Redirect to login if not faculty @Ramses
        header("Location: ../login.php");
        exit();
    }
} else {
   //Redirect to login if user is not logged in @Ramses
    header("Location: ../login.php");
    exit();
}

$conn->close();
?>
