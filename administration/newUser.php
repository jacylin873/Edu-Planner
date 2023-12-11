<?php 
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    
    // Now, $arrayData contains the original array.

    if ($user_array['clearance'] == 0)  {

        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Faculty Home</title>
      <?php echo '<link rel="stylesheet" type="text/css" href="../css/register.css"></head>'; ?>
   </head>
   <body>
   <?php require('./navbar.php'); ?>

    <div class="Main-Content">
        <div class="container">
        <div class="title">User Creation Form</div>
        <div class="content">
      <form action="" method="post"> <!--Registration Form that adds users to database @Ramses--> 
        <div class="user-information">
        <!--Divider for input of: User's email address @Ramses-->
          <div class="input-box">
            <span class="user-input">User Email</span>
            <input type="text" placeholder="Enter an email" id="email" name="email" required>
          </div>
        <!--Divider for input of: User's password @Ramses-->
          <div class="input-box">
            <span class="user-input">Password</span>
            <input type="text" placeholder="Enter a password" id="password" name="password" required>
          </div>
          <div class="input-box">
        <!--Divider for input of: User's first name @Ramses-->
            <span class="user-input">First Name</span>
            <input type="text" placeholder="Enter user's first name" id="firstname" name="firstName" required>
          </div>
        <!--Divider for input of: User's middle name  @Ramses-->
          <div class="input-box">
            <span class="user-input">Middle Name</span>
            <input type="text" placeholder="Enter user's middle name" id="middlename" name="middleName">
          </div>
        <!--Divider for input of: User's last name @Ramses-->
          <div class="input-box">
            <span class="user-input">Last Name</span>
            <input type="text" placeholder="Enter user's last name" id="lastname" name="lastName" required>
          </div>
        <!--Divider for input of: User's first line of their address  @Ramses-->
          <div class="input-box">
            <span class="user-input">Address 1</span>
            <input type="text" placeholder="Enter first line of user's address" id="address_one" name="address_one" required>
          </div>
        <!--Divider for input of: User's second line of their address @Ramses-->
          <div class="input-box">
            <span class="user-input">Address 2</span>
            <input type="text" placeholder="Enter second line of user's address" id="address_two" name="address_two">
          </div>
        <!--Divider for input of: User's city @Ramses-->
          <div class="input-box">
            <span class="user-input">City</span>
            <input type="text" placeholder="Enter user's city" id="city" name="city" required>
          </div>
        <!--Divider for input of: User's state @Ramses-->
          <div class="input-box">
            <span class="user-input">State</span>
            <input type="text" placeholder="Enter user's state" id="state" name="state" required>
          </div>
        <!--Divider for input of: User's zipcode @Ramses-->
          <div class="input-box">
            <span class="user-input">Zipcode</span>
            <input type="text" placeholder="Enter user's zipcode" id="zipcode" name="zipcode" required>
          </div>
        <!--Divider for input of: User's country of residence @Ramses-->
          <div class="input-box">
            <span class="user-input" style="display: inline; float: none;">Country Name</span>
          <select id="country" name="country" class="countries" >
                <?php
                include("../includes/connect.php");
                $sql = "SELECT * FROM countries";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['CTID']."'>".$row['country_name']."</option>";
                }
                ?></select>
          </div>
        <!--Divider for input of: User's phone number @Ramses-->
          <div class="input-box">
            <span class="user-input">Phone Number</span>
            <input type="text" placeholder="Enter user's phone number" id="phone_number" name="phone_number" required>
          </div>
        </div>
        <!--Divider for input of: which type of user being created @Ramses-->
        <div class="user-type-input">
          <input type="radio" name="clearemce" id="clear-1" value="0">
          <input type="radio" name="clearence" id="clear-2" value="1">
          <input type="radio" name="clearence" id="clear-3" value="2" checked="checked">
          <span class="choice-title">What position will this new user have at the university?</span>
          <div class="category">
            <label for="clear-1">
              <span class="dot one"></span>
              <span class="clearence">Admin</span>
            </label>
            <label for="clear-2">
              <span class="dot two"></span>
              <span class="clearence">Faculty</span>
            </label>
            <label for="clear-3">
              <span class="dot three"></span>
              <span class="clearence">Student</span>
            </label>
          </div>
        </div>
        <!--Divider for input of: confirmation of desire to create user @Ramses-->
        <div class="choice-user-input">
          <input type="radio" name="choice" id="dot-1" value="true" required>
          <input type="radio" name="choice" id="dot-2" value="false" checked="checked">
          <span class="choice-title">Are you sure you would like to make a new user?</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="choice">Yes</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="choice">No</span>
          </label>
          </div>
        </div>
        <!--Divider for registration button @Ramses-->
        <div class="button">
          <input type="submit" name="Register" value="Register">
        </div>
        <?php include("../includes/registerArithmetic.php")?>
      </form>
        </div>
        </div>           
    
    </div>
           
    
    
    <script src="../navbar.js"></script>
    </body>
        </html>
        <?php 
    }
}
else{
    header("Location: ../login.php");
    exit();
}
?>