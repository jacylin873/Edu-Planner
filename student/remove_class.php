<?php
//Define cookie name and make array to cookie value @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie is set @Ramses
if (isset($_COOKIE[$cookie_name])) {
    //Unserialize user data and set it to the new array @Ramses
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user is admin, faculty, or student @Ramses
    if ($user_array['clearance'] == (0) || $user_array['clearance'] == (1) || $user_array['clearance'] == (2)) {
        //Connect to database @Ramses
        include("../includes/connect.php");
        //Retrieve classes array from user @Ramses
        $user_id = $user_array['UPID'];
        $sql = "SELECT classes FROM user_profile WHERE UPID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($classesJson);
        $stmt->fetch();
        $stmt->close();
        //Decode the JSON array @Ramses
        $classesArray = json_decode($classesJson, true);
        //Define the class to remove from the array @Ramses
        $class_to_remove = (int)$_POST['crn'];
        //Find the index of the desired class to remove @Ramses
        $index_to_remove = array_search($class_to_remove, $classesArray);
        //Check if class to be removed is present in array @Ramses
        if ($index_to_remove !== false) {
            //Renove class from array @Ramses
            $crn_to_remove = $classesArray[$index_to_remove];
            unset($classesArray[$index_to_remove]);
            //Encode classes rray as JSON @Ramses
            $updated_classes_json = json_encode(array_values($classesArray));
            //Update classes array with modified array @Ramses
            $update_sql = "UPDATE user_profile SET classes = ? WHERE UPID = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $updated_classes_json, $user_id);
            $update_stmt->execute();
            $update_stmt->close();
            //Add 1 available seat for the removed class
            $increment_sql = "UPDATE courses SET available_seats = available_seats + 1 WHERE CRN = ?";
            $increment_stmt = $conn->prepare($increment_sql);
            $increment_stmt->bind_param("i", $crn_to_remove);
            $increment_stmt->execute();
            $increment_stmt->close();
            //Provide success message
            echo json_encode(['success' => true, 'message' => 'Class removed successfully']);
        } else {
            //Provide error message
            echo json_encode(['success' => false, 'message' => 'Class not found']);
        }
            $conn->close();
    }
} 
    //If cookie not set, send error message
    else {
    echo json_encode(['success' => false, 'message' => 'Authentication failure']);
}
?>


