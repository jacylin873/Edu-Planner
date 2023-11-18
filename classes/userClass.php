<?php
//
class User{
    private $UPID;
    public $user_email;
    public $user_password;
    public $f_name;
    public $m_name;
    public $l_name;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $phone_num;
    public $clearance;


    /**===========================================================================================================================================================================
     * Method to login a user
     */
    public function login_User($email_input, $password_input) {
        // Connect to the database
        include("connect.php");
        //SQL command to select from database saved user which matches inputs
        $sql = "SELECT * FROM user_profile WHERE user_email ='$email_input' AND user_password ='$password_input'";
        $result = mysqli_query($conn, $sql);
//Continue if result if found; return to login if not
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
//Double checks that the value in the database is equal to inputted values
            if ($row['user_email'] === $email_input && $row['user_password'] === $password_input) {
//Turns important fields into $_Session variables to be checked by following pages
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['f_name'] = $row['f_name'];
                $_SESSION['UPID'] = $row['UPID'];
                $_SESSION['logged_user'] = $row;
                $_SESSION['clearance'] = $row['clearance'];
//Sets user data as a cookie
                $cookie_name = "eduPlanner_logged_user";
                $cookie_value = serialize($_SESSION['logged_user']);
                //unserialize() used to convert back to array
                setcookie($cookie_name, $cookie_value, time() + 3600, "/");
//Sends user to admin page if clearance level is 0
                if ($_SESSION['clearance'] == 0){
                    header("Location: ../administration/adminHome.php");
                    exit();
                    }            
//Sends user to faculty page if clearance level is 1    
                else if ($_SESSION['clearance'] == 1){
                    header("Location: ../faculty/facultyHome.php");
                    exit();
                    }
//Sends user to student page if clearance level is 2              
                else if ($_SESSION['clearance'] == 2){
                    header("Location: ../student/studentHome.php");
                    exit();
                }
//Sends user back to login page if clearance level is nonexistent
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


    /**===========================================================================================================================================================================
     * Method to insert a user into database table
     */
    public function insert_User($user_email, $user_password, $f_name, $m_name , $l_name, $address1, $address2, $city, $state, $zip, $country, $phone_num, $clearance){
        //Connect to database
        include("includes/connect.php");
        //Write query for a repeated email @Angel
        $checkEmail = "SELECT * FROM user_profile where user_email = '$user_email'";
        //Make query and get results @Angel
        $result = mysqli_query($conn, $checkEmail);
        //Ensures radio button to confirm desire to make user is turned to boolean @Ramses
        $choice = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_BOOL);
        //Kills the php program if 'No' response for adding user is clicked @Ramses
        if (! $choice){
        die("Make sure you would like to create the new user");
        }
        //Statement to check if inputted email is already existing in database table. If email is not being used yet, continue to insert all values to database. @Angel
        if(mysqli_num_rows($result) > 0){
        echo "Email is already being used.";
        }else{
            //Check if valid email address is inputted @Angel
            if(strpos($user_email, '@newpaltz.edu') !== false){
                //SQL Command to add the user based on the database variables we had set earlier @Ramses
                //Change 'user' if that is not the name of your table @Ramses
                $sql = "INSERT INTO user_profile (user_email, user_password, f_name, m_name, l_name, address1, address2, city, state, zip, country, phone_num, clearance) VALUES(?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)){
                die(mysqli_error($conn));
                }
                //Setting parameters of insert @Ramses
                mysqli_stmt_bind_param($stmt,"ssssssssssssi",$user_email, $user_password, $f_name, $m_name , $l_name, $address1, $address2, $city, $state, $zip, $country, $phone_num, $clearance);
                mysqli_stmt_execute($stmt);
                //Display "submission successful alert"
                echo '<script>alert("Submission successful")</script>';
                //Free result from memory @Angel
                mysqli_free_result($result);
                //Close database connection @Angel
                mysqli_close($conn);
                //Redirect to index.php once new user is registered @Angel
                echo "<script>window.location.href='login.php';</script>";
            }else{
                //If email is not valid (missing '@' or '.'), display error message @Angel
                echo "Please enter a valid New Paltz email address.";
            }
        }
    }
}
?>



