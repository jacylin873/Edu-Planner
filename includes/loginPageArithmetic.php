<?php
session_start(); 
//Connects to the database.
include("connect.php");
//checks if $_POST varibles already exist or Cookie exists
if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
//Sanitizes the user information submitted before sending into database
    function check($form_info){
        $form_info = trim($form_info);
        $form_info = stripslashes($form_info);
        $form_info = htmlspecialchars($form_info);
        return $form_info;
     }
//Sanitizes the submitted email
    $user_email = check($_POST['user_email']);
//Sanitizes the submitted password
    $password = check($_POST['user_password']);
//Generates error message if email field is empty
    if (empty($user_email)) {
        header("Location: ../login.php?error=Email is required");
        exit();
    } 
//Generates error message if password field is empty
    else if(empty($password)){
        header("Location: ../login.php?error=Password is required");
        exit();
    } 
//Continue if the passowrd field and email field are empty    
    else{
//SQL command to select from database saved user which matches inputs
        $sql = "SELECT * FROM user_profile WHERE user_email ='$user_email' AND user_password ='$password'";
        $result = mysqli_query($conn, $sql);
//Continue if result if found; return to login if not
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
//Double checks that the value in the database is equal to inputted values
            if ($row['user_email'] === $user_email && $row['user_password'] === $password) {
//Turns important fields into $_Session variables to be checked by following pages
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['f_name'] = $row['f_name'];
                $_SESSION['UPID'] = $row['UPID'];
                $_SESSION['logged_user'] = $row;
                $_SESSION['clearence'] = $row['clearence'];
//Sets user data as a cookie
                $cookie_name = "eduPlanner_logged_user";
                $cookie_value = serialize($_SESSION['logged_user']);
                //unserialize() used to convert back to array
                setcookie($cookie_name, $cookie_value, time() + 3600, "/");
//Sends user to admin page if clearence level is 0
                if ($_SESSION['clearence'] == 0){
                    header("Location: ../administration/adminHome.php");
                    exit();
                    }            
//Sends user to faculty page if clearence level is 1    
                else if ($_SESSION['clearence'] == 1){
                    header("Location: ../faculty/facultyHome.php");
                    exit();
                    } 
//Sends user to student page if clearence level is 2               
                else if ($_SESSION['clearence'] == 2){
                    header("Location: ../student/studentHome.php");
                    exit();
                }
//Sends user back to login page if clearence level is nonexistent
                else{
                    header("Location: ../login.php");
                    exit();
                }
            }
//Sends user back to login page            
            else{
                header("Location: ../login.php?error=Incorect Email or password");
                exit();
            }
        }
//Sends user back to login page        
        else{
            header("Location: ../login.php?error=Incorect Email or password");
            exit();
        }
    }
}
//Sends user back to login page
else{
    header("Location: ../login.php");
    exit();
}