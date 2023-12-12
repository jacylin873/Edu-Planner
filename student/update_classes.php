<?php
//Set cookie name and create user array @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie is set @Ramses
if (isset($_COOKIE[$cookie_name])) {
    //Unserialize cookie data and place in array
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user is admin, faculty, or student  @Ramses
    if ($user_array['clearance'] == (0) || $user_array['clearance'] == (1) || $user_array['clearance'] == (2)) {
        //Connect to database  @Ramses
        include("../includes/connect.php");
        //Function to return the course course for a given CRN @Ramses
        function getCourseForCRN($crn, $conn) {
            $sql = "SELECT course FROM courses WHERE CRN = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $crn);
            $stmt->execute();
            $stmt->bind_result($course);
            $stmt->fetch();
            $stmt->close();
            return $course;
        }
        //Function to create an array of course code for a given CRN @Ramses
        function createCourseCodesArray($userClasses, $conn) {
            $courseCodes = array();
            foreach ($userClasses as $classCRN) {
                $course = getCourseForCRN($classCRN, $conn);
                if ($course !== null) {
                    $courseCodes[] = $course;
                }
            }
            return $courseCodes;
        }
        //Function to check if a new class has a time conflict with existing class in schedule @Ramses
        function hasTimeConflict($newClass, $userClasses, $conn) {
            //Query to get days and time for new class
            $sqlNewClass = "SELECT days, time FROM courses WHERE CRN = ?";
            $stmtNewClass = $conn->prepare($sqlNewClass);
            $stmtNewClass->bind_param("i", $newClass);
            $stmtNewClass->execute();
            $stmtNewClass->bind_result($newDays, $newTime);
            //Array to store occurences of days and time for new class
            $occurrences = [];
            while ($stmtNewClass->fetch()) {
                $occurrences[] = ['days' => $newDays, 'time' => $newTime];
            }
            $stmtNewClass->close();
            //For each class in the existing schedule, check if there is a time conflict @Ramses
            foreach ($userClasses as $classCRN) {
                //Query to get days and time for existing class @Ramses
                $sqlExistingClass = "SELECT days, time FROM courses WHERE CRN = ?";
                $stmtExistingClass = $conn->prepare($sqlExistingClass);
                $stmtExistingClass->bind_param("i", $classCRN);
                $stmtExistingClass->execute();
                $stmtExistingClass->bind_result($existingDays, $existingTime);
                while ($stmtExistingClass->fetch()) {
                    //Check for day intersection between new and existing class @Ramses
                    foreach ($occurrences as $occurrence) {
                        //Check for time overlap between the classes @Ramses
                        if (array_intersect(str_split($occurrence['days']), str_split($existingDays))) {
                            list($newStartTime, $newEndTime) = explode('-', $occurrence['time']);
                            list($existingStartTime, $existingEndTime) = explode('-', $existingTime);
                            //Converts time to stimstamps @Ramses
                            $newStartTimestamp = strtotime("today " . $newStartTime);
                            $newEndTimestamp = strtotime("today " . $newEndTime);
                            $existingStartTimestamp = strtotime("today " . $existingStartTime);
                            $existingEndTimestamp = strtotime("today " . $existingEndTime);
                            //Check various time conflict conditions @Ramses
                            if (
                                ($newStartTimestamp < $existingEndTimestamp && $newStartTimestamp >= $existingStartTimestamp) ||
                                ($newEndTimestamp > $existingStartTimestamp && $newEndTimestamp <= $existingEndTimestamp) ||
                                ($newStartTimestamp <= $existingStartTimestamp && $newEndTimestamp >= $existingEndTimestamp) ||
                                ($newStartTimestamp >= $existingStartTimestamp && $newEndTimestamp <= $existingEndTimestamp)
                            ) {
                                //Return true if there is a time conflict @Ramses
                                return true; 
                            }
                        }
                    }
                }
                $stmtExistingClass->close();
            }
            //Return false if no time conflict @Ramses
            return false; 
        }
        //Function to check if available seats for the class is more than 0 @Ramses
        function availabilityCheck($newCRN, $conn) {
            $sql = "SELECT available_seats FROM courses WHERE CRN = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $newCRN);
            $stmt->execute();
            $stmt->bind_result($availableSeats);
            $stmt->fetch();
            $stmt->close();
            return $availableSeats > 0;
        }
        //Function to return the total number of credits in schedule @Ramses
        function countCredits($userClasses, $conn) {
            $totalCredits = 0;
            foreach ($userClasses as $classCRN) {
                $sql = "SELECT credits FROM courses WHERE CRN = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $classCRN);
                $stmt->execute();
                $stmt->bind_result($credits);
                $stmt->fetch();
                $stmt->close();
                $totalCredits += $credits;
            }

            return $totalCredits;
        }
        //Function to check if adding a new class would exceed the 20 credit limit @Ramses
        function checkCredits($newCRN, $userClasses, $conn) {
            $creditsLimit = 20;
            $currentTotalCredits = countCredits($userClasses, $conn);
            $sql = "SELECT credits FROM courses WHERE CRN = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $newCRN);
            $stmt->execute();
            $stmt->bind_result($newClassCredits);
            $stmt->fetch();
            $stmt->close();
            return ($currentTotalCredits + $newClassCredits) <= $creditsLimit;
        }
        //Retrieve user's classes array information @Ramses
        $sqlClasses = "SELECT classes FROM user_profile WHERE UPID = ?";
        $stmtClasses = $conn->prepare($sqlClasses);
        $stmtClasses->bind_param("i", $user_array['UPID']);
        $stmtClasses->execute();
        $stmtClasses->bind_result($classesJson);
        $stmtClasses->fetch();
        $stmtClasses->close();
        //Decode user's classes information and save to array @Ramses
        $userClasses = json_decode($classesJson, true);
        $courseCodes = createCourseCodesArray($userClasses, $conn);
        //Process POST request to add new class @Ramses
        if (isset($_POST['crn'])) {
            $newCRN = (int)$_POST['crn'];
            if (checkCredits($newCRN, $userClasses, $conn)) {
                if (availabilityCheck($newCRN, $conn)) {
                    $newCourse = getCourseForCRN($newCRN, $conn);
                    if (!in_array($newCourse, $courseCodes)) {
                        if (!hasTimeConflict($newCRN, $userClasses, $conn)) {
                            $sql = "UPDATE user_profile SET classes = JSON_ARRAY_APPEND(classes, '$', ?) WHERE UPID = ?";
                            $stmt = $conn->prepare($sql);
                            $jsonAppendParam = json_encode($newCRN);
                            $stmt->bind_param("is", $jsonAppendParam, $user_array['UPID']);
                            $stmt->execute();
                            //Check if update was successful @Ramses
                            if ($stmt->affected_rows > 0) {
                                //Remove a available seat from added class @Ramses
                                $updateSeatsSql = "UPDATE courses SET available_seats = available_seats - 1 WHERE CRN = ?";
                                $updateSeatsStmt = $conn->prepare($updateSeatsSql);
                                $updateSeatsStmt->bind_param("i", $newCRN);
                                $updateSeatsStmt->execute();
                                $updateSeatsStmt->close();
                                $response = array('success' => true);
                            } else {
                                $response = array('success' => false, 'message' => 'Failed to update classes.');
                            }
                            $stmt->close();
                        } else {
                            $response = array('success' => false, 'message' => 'Error: Time conflict with existing classes or labs.');
                        }
                    } else {
                        $response = array('success' => false, 'message' => 'Error: Another class with the same course code already exists in your schedule. Please remove the class in your schedule and try again.');
                    }
                } else {
                    $response = array('success' => false, 'message' => 'Unfortunately, the class you are trying to register for is full.');
                }
            } else {
                $response = array('success' => false, 'message' => 'Sorry, you have surpassed the maximum amount of credits able to be added per semester without advisor approval. Please see your advisor for assistance or remove a class from your current schedule and try again.');
            }
            //Send JSON response
            echo json_encode($response);
        } else {
            //Send error response if CRN is not provided @Ramses
            $response = array('success' => false, 'message' => 'Error: CRN not provided.');
            echo json_encode($response);
        }
        $conn->close();
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>
