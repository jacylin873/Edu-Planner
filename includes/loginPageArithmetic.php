<?php

//Connects to the database.
include("connect.php");


//write query for all users
$sql = 'SELECT user_email, user_password FROM user_profile';

//make query & get results
$result = mysqli_query($conn, $sql);

//fetch the rows from db table as an array
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


//Check if login button has been clicked, if so continue to other if-statements.
if(isset($_POST['submit'])){

//Conditional statement to check if either 'password' or 'username' is empty when submitting       
if(empty($_POST['email']) || (empty($_POST['password']))){

    //If either is empty, print error statement.
    echo 'Incorrect email or password';

        } else {
            
    //If input boxes are not empty, store the inputted text into $inputEmail and $inputPassword
    $inputEmail = ($_POST['email']);
    $inputPassword = ($_POST['password']);
    
    //Variable to check whether a correct match between database and user inputted data is established.
    $matchFound = False;

    //Variables to store email and password once a correct match has been found.
    $email;
    $password;
    
    
    //For each loop to cycle between the arrays that were formed using the database table.
    foreach($users as $user){
        //Stores the email in the associative array as $tempEmail.
        $tempEmail = htmlspecialchars($user['user_email']);
        //Stores the password in the associative array as $tempPassword.
        $tempPassword = htmlspecialchars($user['user_password']);

        //Checks if database info matches the inputted values.
        if(($tempEmail == $inputEmail) && ($tempPassword == $inputPassword)){
        //stores correct email inside variable $email
        $email = $tempEmail;
        //stores correct password inside variable $password
        $password = $tempPassword;
        $matchFound = True;

        //free result from memory
        mysqli_free_result($result);

        //close database connection
        mysqli_close($conn);

        //redirects to homepage.
        header("location:homepage.php");
        }
    }

    //If the email does not match password, print error statement.
  if (!$matchFound){
    echo "Incorrect email or password";
    }
}
}