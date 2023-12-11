<?php
include("../includes/connect.php");
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;

if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);

    if ($user_array['clearance'] == 1)  {
        $instructorName = $user_array['f_name'] . ' ' . $user_array['l_name'];
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
               echo "No courses found for the instructor.";
            }
         ?>
      </div>
   </body>
</html>

<?php
    } else {
        header("Location: ../login.php");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}

$conn->close();
?>
