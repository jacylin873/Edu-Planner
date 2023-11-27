<?php
$cookie_name = "eduPlanner_logged_user";
$user_array;

if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);

    if ($user_array['clearance'] == 0 || $user_array['clearance'] == 1 || $user_array['clearance'] == 2) {
        include("../includes/connect.php");
        $user_id = $user_array['UPID'];
        $sql = "SELECT classes FROM user_profile WHERE UPID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($classesJson);
        $stmt->fetch();
        $stmt->close();
        if (empty($classesJson)) {
            echo '<h2>Your Classes: </h2>';
            echo '<p>No classes registered.</p>';
        } else {
            $classesArray = json_decode($classesJson, true);
            $organizedClasses = array();
            foreach ($classesArray as $crn) {
                $sql = "SELECT * FROM courses WHERE CRN = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $crn);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    if (!isset($organizedClasses[$crn])) {
                        $organizedClasses[$crn] = array();
                    }
                    $organizedClasses[$crn][] = $row;
                }
                $stmt->close();
            }

            echo '<h2>Your Classes: </h2>';
            foreach ($organizedClasses as $crn => $classes) {
                echo '<ul><span class="title"><h3>' . $crn . ' - ' . $classes[0]['title'] . '</h3>';
                echo '<button class="removeClassButton" data-crn="' . $crn . '">Remove Class</button></span>';
                foreach ($classes as $class) {
                    echo '<li>' . $class['course'] . ' - ' . $class['title'] . ' - ' . $class['days'] . ' - ' . $class['time'] . '</li>';
                }
                echo '</ul>';
            }
        }
        $conn->close();
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>





