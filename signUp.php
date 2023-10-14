<?php
//Php code to turn HTML inputs into the database critera @Ramses
// Format: $db_variable = $_POST["form_variable"]; @Ramses
$user_email = $_POST["email"];
$user_password = $_POST["password"];
$f_name = $_POST["firstname"];
$m_name = $_POST["middlename"];
$l_name = $_POST["lastname"];
$address1 = $_POST["address_one"];
$address2 = $_POST["address_two"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zipcode"];
$country = $_POST["country"];
$phone_num = $_POST["phone_number"];
//Ensures radio button to confirm desire to make user is turned to boolean @Ramses
$choice = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_BOOL);
//Kills the php program if 'No' response for adding user is clicked @Ramses
if (! $choice){
    die("Make sure you would like to create the new user");
}
//Sets up connection to database @Ramses
//I used my database; Database credentials and name must be changed when using your own @Ramses
$host = "localhost";
$dbname = "planner_sign_up";
$username = "root";
$password = "";
$conn = mysqli_connect($host,$username,$password,$dbname);
if (mysqli_connect_errno()){
    die("Connection error: " . mysqli_connect_error());
}
//SQL Command to add the user based on the database variables we had set earlier @Ramses
//Change 'user' if that is not the name of your table @Ramses
$sql = "INSERT INTO user (user_email, user_password, f_name, m_name , l_name, address1, address2, city, state, zip, country, phone_num) VALUES(?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}
//Setting parameters of insert @Ramses
mysqli_stmt_bind_param($stmt,"ssssssssssss",$user_email, $user_password, $f_name, $m_name , $l_name, $address1, $address2, $city, $state, $zip, $country, $phone_num);
mysqli_stmt_execute($stmt);
echo '<script>alert("Submission successful")</script>'; 
header('Location: signUp.html');