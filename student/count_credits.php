<?php
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    if ($user_array['clearance'] == 0 || $user_array['clearance'] == 1 || $user_array['clearance'] == 2) {
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
        $totalCredits = array_sum($crnCredits);
        $response = array('success' => true, 'total_credits' => $totalCredits);
        echo json_encode($response);
        $conn->close();
    }
} else {
    $response = array('success' => false, 'message' => 'User not logged in.');
    echo json_encode($response);
}
?>

