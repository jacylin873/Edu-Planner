<?php
//Php code to turn HTML inputs into the database critera @Ramses
// Format: $db_variable = $_POST["form_variable"]; @Ramses


//Check if login button has been clicked. @Angel
if(isset($_POST['Register'])){


    //Connects to the database using connect file. @Angel


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
    $clearance = intval($_POST["clearance"]);


    //Call user class
    include_once("classes/userClass.php");
    //Create new user object
    $user = new User();
    //Call insert_User method to insert user into database
    $user->insert_User($user_email, $user_password, $f_name, $m_name , $l_name, $address1, $address2, $city, $state, $zip, $country, $phone_num, $clearance);
}



