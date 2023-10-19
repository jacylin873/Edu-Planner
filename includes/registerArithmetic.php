<?php
//Php code to turn HTML inputs into the database critera @Ramses
// Format: $db_variable = $_POST["form_variable"]; @Ramses


//Check if login button has been clicked. @Angel
if(isset($_POST['Register'])){

//Connects to the database using connect file. @Angel
include("connect.php");

//Retrieve all inputted data and stores it in a variable. @Ramses/Angel
$user_email = $_POST["email"];
$user_password = $_POST["password"];
$f_name = $_POST["firstName"];
$m_name = $_POST["middleName"];
$l_name = $_POST["lastName"];
$address1 = $_POST["address_one"];
$address2 = $_POST["address_two"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zipcode"];
$country = $_POST["country"];
$phone_num = $_POST["phone_number"];

//Write query for a repeated email
$checkEmail = "SELECT * FROM user_profile where user_email = '$user_email'";
//Make query and get results
$result = mysqli_query($conn, $checkEmail);

//Ensures radio button to confirm desire to make user is turned to boolean @Ramses
$choice = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_BOOL);
//Kills the php program if 'No' response for adding user is clicked @Ramses
if (! $choice){
    die("Make sure you would like to create the new user");
}


//Method to check if inputted email is already existing in database table.@Angel
if(mysqli_num_rows($result) > 0){
     echo "Email is already being used.";
}else{
//If email is not being used yet, continue to insert all values to database. @Angel

//SQL Command to add the user based on the database variables we had set earlier @Ramses
//Change 'user' if that is not the name of your table @Ramses
$sql = "INSERT INTO user_profile (user_email, user_password, f_name, m_name, l_name, address1, address2, city, state, zip, country, phone_num) VALUES(?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}
//Setting parameters of insert @Ramses
mysqli_stmt_bind_param($stmt,"ssssssssssss",$user_email, $user_password, $f_name, $m_name , $l_name, $address1, $address2, $city, $state, $zip, $country, $phone_num);
mysqli_stmt_execute($stmt);

//Display "submission succesful alert"
echo '<script>alert("Submission successful")</script>'; 

//free result from memory @Angel
mysqli_free_result($result);

//close database connection @Angel
mysqli_close($conn);

//Redirect to index.php once new user is registered @Angel
echo "<script>window.location.href='loginPage.php';</script>";
}
}
