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
        //Retieve classes array from the database for the user @Ramses
        $user_id = $user_array['UPID'];
        $sqlClasses = "SELECT classes FROM user_profile WHERE UPID = ?";
        $stmtClasses = $conn->prepare($sqlClasses);
        $stmtClasses->bind_param("i", $user_id);
        $stmtClasses->execute();
        $stmtClasses->bind_result($classesJson);
        $stmtClasses->fetch();
        $stmtClasses->close();
        //Decode the JSON array of the classes @Ramses
        $userClasses = json_decode($classesJson, true);
        //Create user classes array if not present in database and add it to th database @Ramses
        if (empty($userClasses) || !is_array($userClasses)) {
            $userClasses = [];
            $emptyClassesJson = json_encode($userClasses);
            $sqlUpdateClasses = "UPDATE user_profile SET classes = ? WHERE UPID = ?";
            $stmtUpdateClasses = $conn->prepare($sqlUpdateClasses);
            $stmtUpdateClasses->bind_param("si", $emptyClassesJson, $user_id);
            $stmtUpdateClasses->execute();
            $stmtUpdateClasses->close();
        }
        //Retrieve unique CRNs and the corresponding credits for that class for the user's classes @Ramses
        //Save in an array @Ramses
        $uniqueCRNs = [];
        $crnCredits = [];
        foreach ($userClasses as $classCRN) {
            if (!in_array($classCRN, $uniqueCRNs)) {
                $uniqueCRNs[] = $classCRN;
                $sqlCredits = "SELECT credits FROM courses WHERE CRN = ?";
                $stmtCredits = $conn->prepare($sqlCredits);
                $stmtCredits->bind_param("i", $classCRN);
                $stmtCredits->execute();
                $stmtCredits->bind_result($credits);
                $stmtCredits->fetch();
                $stmtCredits->close();
                $crnCredits[$classCRN] = $credits;
            }
        }
        //Calculate sum of all the credits for the classes @Ramses
        $totalCredits = array_sum($crnCredits);
        //Send JSON response with success and total credits @Ramses
        $response = array('success' => true, 'total_credits' => $totalCredits);
        echo json_encode($response);
        //Close database @Ramses
        $conn->close();
    }
} else {
    //Send JSON response indicating user not logged in 
    $response = array('success' => false, 'message' => 'User not logged in.');
    echo json_encode($response);
}
?>

