<?php
//Start PHP session @Ramses
session_start();
//Define the name of the cookie used for the user @Ramses
$cookie_name = "eduPlanner_logged_user";
//Declare array to store the unserialized user information @Ramses
$user_array;
//Check if cookie is set @Ramses
if (isset($_COOKIE[$cookie_name])) {
    //Retrieve and unserialize user data from the eduPlanner_logged_user cookie @Ramses
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Checl if user clearence level is that of a student @Ramses
    if ($user_array['clearance'] == 2) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>SUNY NP Student Calendar</title>
            <link rel="stylesheet" href="../css/student/calendar.css">
        </head>
        <body>
            <?php require('./navbar.php'); ?>
            <div class="Main-Content">
                <?php
                //Retrieve and unserialize user data from the eduPlanner_logged_user cookie @Ramses
                $serializedData = $_COOKIE[$cookie_name];
                $user_array = unserialize($serializedData);
                //Connect to database and retrieve user's classes column JSON array @Ramses
                include("../includes/connect.php");
                $user_id = $user_array['UPID'];
                $sqlClasses = "SELECT classes FROM user_profile WHERE UPID = ?";
                $stmtClasses = $conn->prepare($sqlClasses);
                $stmtClasses->bind_param("i", $user_id);
                $stmtClasses->execute();
                $stmtClasses->bind_result($classesJson);
                $stmtClasses->fetch();
                $stmtClasses->close();
                //Decode the classes JSON array retrieved from the database @Ramses
                $userClasses = json_decode($classesJson, true);

                //Create an empty user classes array if the user does not have an array already @Ramses
                if (empty($userClasses) || !is_array($userClasses)) {
                    //Create empty array, encode it in JSON and push it to the user's classes array in the database @Ramses
                    $userClasses = [];
                    $emptyClassesJson = json_encode($userClasses);
                    $sqlUpdateClasses = "UPDATE user_profile SET classes = ? WHERE UPID = ?";
                    $stmtUpdateClasses = $conn->prepare($sqlUpdateClasses);
                    $stmtUpdateClasses->bind_param("si", $emptyClassesJson, $user_id);
                    $stmtUpdateClasses->execute();
                    $stmtUpdateClasses->close();
                }
                //Retrieve and organize class details from the database based on CRN values @Ramses 
                $classesDetails = [];
                //Repeat loop for every CRN value in the array @Ramses
                foreach ($userClasses as $crn) {
                    //Select all courses with matching CRN @Ramses
                    $sqlClassDetails = "SELECT * FROM courses WHERE CRN = ?";
                    $stmtClassDetails = $conn->prepare($sqlClassDetails);
                    $stmtClassDetails->bind_param("i", $crn);
                    $stmtClassDetails->execute();
                    $resultClassDetails = $stmtClassDetails->get_result();
                    $classDetailsArray = $resultClassDetails->fetch_all(MYSQLI_ASSOC);
                    $stmtClassDetails->close();
                    //Add the class details to the array @Ramses
                    foreach ($classDetailsArray as $classDetails) {
                        $classesDetails[] = $classDetails;
                    }
                    if (empty($classDetailsArray)) {
                        echo "Warning: Class details not found for CRN $crn.<br>";
                    }
                }
                //Organize classes by day and siplay the schedule @Ramses
                $classesByDay = array(
                    'M' => array(),
                    'T' => array(),
                    'W' => array(),
                    'R' => array(),
                    'F' => array(),
                );
                //Array that uses word values to point to the letter value @Ramses
                $dayPrint = array(
                    'M' => 'Monday',
                    'T' => 'Tuesday',
                    'W' => 'Wednesday',
                    'R' => 'Thursday',
                    'F' => 'Friday'
                );
                //Checks if class details isn't empty @Ramses
                if (!empty($classesDetails)) {
                    //Splits the classes into the different days they're instructed @Ramses
                    foreach ($classesDetails as $class) {
                        //Splits the days string
                        $daysArray = str_split($class['days']);
                        foreach ($daysArray as $day) {
                            //Saves the class for that day into array for that specific day @Ramses
                            $classesByDay[$day][] = $class;
                        }
                    }
                    //Iterate through each day's class and sorth them by start time @Ramses
                    foreach ($classesByDay as &$classes) {
                        //Sort the classes based on their start time @Ramses
                        usort($classes, function ($a, $b) {
                            //Extract start time from the information and convert @Ramses
                            $timeAStart = DateTime::createFromFormat('h:i A', explode('-', $a['time'])[0]);
                            $timeBStart = DateTime::createFromFormat('h:i A', explode('-', $b['time'])[0]);
                            //Compare start times
                            return $timeAStart <=> $timeBStart;
                        });
                    }
                    //Unset references to $classes @Ramses
                    unset($classes);
                    //Display organized schedule @Ramses
                    foreach ($classesByDay as $day => $classes) {
                        if (!empty($classes)) {
                            //Define columns of the calendar table @Ramses
                            echo "<h2>$dayPrint[$day]</h2>";
                            echo "<table>";
                            echo "<tr>";
                            echo "<th>Course</th>";
                            echo "<th>Title</th>";
                            echo "<th>Days</th>";
                            echo "<th>Time</th>";
                            echo "<th>Location</th>";
                            echo "<th>Professor</th>";
                            echo "<th>Credits</th>";
                            echo "</tr>";
                            //For every class, put the respective column value of the class in the column of the table @Ramses
                            foreach ($classes as $class) {
                                echo "<tr>";
                                echo "<td>" . $class['course'] . "</td>";
                                echo "<td>" . $class['title'] . "</td>";
                                echo "<td>" . $class['days'] . "</td>";
                                echo "<td>" . $class['time'] . "</td>";
                                echo "<td>" . $class['loc'] . "</td>";
                                echo "<td>" . $class['instructor'] . "</td>";
                                echo "<td>" . $class['credits'] . "</td>";
                                echo "</tr>";
                            }
                            //Display the table to the page @Ramses
                            echo "</table>";
                        }
                    }
                } else {
                    echo "You do not have any classes in your schedule";
                }
                //Close the database connection @Ramses
                $conn->close();
                ?>
            </div>
        </body>
        <?php require('../loggedFooter.php'); ?>
        </html>
        <?php
    }
} else {
    //Redirect to login if cookie invalid @Ramses
    header("Location: ../login.php");
    exit();
}
?>