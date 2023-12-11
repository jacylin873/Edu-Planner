<?php
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;

if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);

    if ($user_array['clearance'] == 2) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>SUNY NP Faculty Home</title>
            <link rel="stylesheet" href="../css/userNavbar.css">
            <link rel="stylesheet" href="../css/student/calendar.css">
        </head>

        <body>
            <?php require('./navbar.php'); ?>
            <div class="Main-Content">
                <?php
                $serializedData = $_COOKIE[$cookie_name];
                $user_array = unserialize($serializedData);
                include("../includes/connect.php");
                $user_id = $user_array['UPID'];
                $sqlClasses = "SELECT classes FROM user_profile WHERE UPID = ?";
                $stmtClasses = $conn->prepare($sqlClasses);
                $stmtClasses->bind_param("i", $user_id);
                $stmtClasses->execute();
                $stmtClasses->bind_result($classesJson);
                $stmtClasses->fetch();
                $stmtClasses->close();
                $userClasses = json_decode($classesJson, true);
                if (empty($userClasses) || !is_array($userClasses)) {
                    $userClasses = [];
                    $emptyClassesJson = json_encode($userClasses);
                    $sqlUpdateClasses = "UPDATE user_profile SET classes = ? WHERE UPID = ?";
                    $stmtUpdateClasses = $conn->prepare($sqlUpdateClasses);
                    $stmtUpdateClasses->bind_param("si", $emptyClassesJson, $user_id);
                    $stmtUpdateClasses->execute();
                    $stmtUpdateClasses->close();
                }

                $classesDetails = [];
                foreach ($userClasses as $crn) {
                    $sqlClassDetails = "SELECT * FROM courses WHERE CRN = ?";
                    $stmtClassDetails = $conn->prepare($sqlClassDetails);
                    $stmtClassDetails->bind_param("i", $crn);
                    $stmtClassDetails->execute();
                    $resultClassDetails = $stmtClassDetails->get_result();
                    $classDetailsArray = $resultClassDetails->fetch_all(MYSQLI_ASSOC);
                    $stmtClassDetails->close();
                    foreach ($classDetailsArray as $classDetails) {
                        $classesDetails[] = $classDetails;
                    }
                    if (empty($classDetailsArray)) {
                        echo "Warning: Class details not found for CRN $crn.<br>";
                    }
                }

                $classesByDay = array(
                    'M' => array(),
                    'T' => array(),
                    'W' => array(),
                    'R' => array(),
                    'F' => array(),
                );
                $dayPrint = array(
                    'M' => 'Monday',
                    'T' => 'Tuesday',
                    'W' => 'Wednesday',
                    'R' => 'Thursday',
                    'F' => 'Friday'
                );

                if (!empty($classesDetails)) {
                    foreach ($classesDetails as $class) {
                        $daysArray = str_split($class['days']);
                        foreach ($daysArray as $day) {
                            $classesByDay[$day][] = $class;
                        }
                    }

                    foreach ($classesByDay as &$classes) {
                        usort($classes, function ($a, $b) {
                            $timeAStart = DateTime::createFromFormat('h:i A', explode('-', $a['time'])[0]);
                            $timeBStart = DateTime::createFromFormat('h:i A', explode('-', $b['time'])[0]);
                            return $timeAStart <=> $timeBStart;
                        });
                    }
                    unset($classes);

                    foreach ($classesByDay as $day => $classes) {
                        if (!empty($classes)) {
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

                            echo "</table>";
                        }
                    }
                } else {
                    echo "You do not have any classes in your schedule";
                }

                $conn->close();
                ?>
            </div>
        </body>

        </html>
        <?php
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>







