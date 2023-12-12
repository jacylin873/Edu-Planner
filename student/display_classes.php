<?php
//Define name of the user cookie @Ramses
$cookie_name = "eduPlanner_logged_user";
//Decare an array to store user information @Ramses
$user_array;
//Check if cookie is set @Ramses
if (isset($_COOKIE[$cookie_name])) {
    //Retrieve and unserialize user data from cookie @Ramses
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user is admin, faculty, or student @Ramses
    if ($user_array['clearance'] == 0 || $user_array['clearance'] == 1 || $user_array['clearance'] == 2) {
        //Connect to database
        include("../includes/connect.php");
        //Retrieve classes array for the user @Ramses
        $user_id = $user_array['UPID'];
        $sql = "SELECT classes FROM user_profile WHERE UPID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($classesJson);
        $stmt->fetch();
        $stmt->close();
        //If classes array empty, tell user No classes registered @Ramses
        if (empty($classesJson)) {
            echo '<h2>Your Classes: </h2>';
            echo '<p>No classes registered.</p>';
        } 
            //If classes array not empty, continue @Ramses
            else {
                //Decode JSON array @Ramses
                $classesArray = json_decode($classesJson, true);
                $organizedClasses = array();
                //Retrieve all the classes with the matching CRN value to the values in the array @Ramses
                foreach ($classesArray as $crn) {
                    $sql = "SELECT * FROM courses WHERE CRN = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $crn);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    //Save the row into array @Ramses
                    while ($row = $result->fetch_assoc()) {
                        if (!isset($organizedClasses[$crn])) {
                            $organizedClasses[$crn] = array();
                        }
                        $organizedClasses[$crn][] = $row;
                    }
                    $stmt->close();
                }
                //Display the class @Ramses
                echo '<h2>Your Classes: </h2>';
                foreach ($organizedClasses as $crn => $classes) {
                    //List the title and CRN value @Ramses
                    echo '<ul><span class="title"><h3>' . $crn . ' - ' . $classes[0]['title'] . '</h3>';
                    //Add remove class button @Ramses
                    echo '<button class="removeClassButton" data-crn="' . $crn . '">Remove Class</button></span>';
                    //Loop to show all classes with matching CRNs @Ramses
                    foreach ($classes as $class) {
                        echo '<li>' . $class['course'] . ' - ' . $class['title'] . ' - ' . $class['days'] . ' - ' . $class['time'] . '</li>';
                    }
                    echo '</ul>';
                }
        }
        //Close database @Ramses
        $conn->close();
    }
} else {
    //Redirect to login if cookie isn't valid @Ramses
    header("Location: ../login.php");
    exit();
}
?>





