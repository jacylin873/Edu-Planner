<?php

$cookie_name = "eduPlanner_logged_user";
$user_array;

if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    if ($user_array['clearance'] == (0) || $user_array['clearance'] == (1) || $user_array['clearance'] == (2)) {
        include("../includes/connect.php");
        $user_id = $user_array['UPID'];
        $sql = "SELECT classes FROM user_profile WHERE UPID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($classesJson);
        $stmt->fetch();
        $stmt->close();
        $classesArray = json_decode($classesJson, true);
        $class_to_remove = (int)$_POST['crn'];
        $index_to_remove = array_search($class_to_remove, $classesArray);
if ($index_to_remove !== false) {
    $crn_to_remove = $classesArray[$index_to_remove];
    unset($classesArray[$index_to_remove]);
    $updated_classes_json = json_encode(array_values($classesArray));
    $update_sql = "UPDATE user_profile SET classes = ? WHERE UPID = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $updated_classes_json, $user_id);
    $update_stmt->execute();
    $update_stmt->close();
    $increment_sql = "UPDATE courses SET available_seats = available_seats + 1 WHERE CRN = ?";
    $increment_stmt = $conn->prepare($increment_sql);
    $increment_stmt->bind_param("i", $crn_to_remove);
    $increment_stmt->execute();
    $increment_stmt->close();
    echo json_encode(['success' => true, 'message' => 'Class removed successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Class not found']);
}
    $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Authentication failure']);
}
?>


