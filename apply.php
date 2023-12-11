<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY New Paltz</title>
      <link rel="stylesheet" href="css/navbar.css">
      <link rel="stylesheet" href="css/apply.css">
   </head>
   <body>
    
   <?php require('./navbar.php'); ?>
<img class= "apply-img"src="./img/np_apply.png" alt="Apply to New Paltz for Free Oct 16 - 29">
    </img>
  <div id="Apply-Div">
    <div class="container"> 
        <div class="title">Application Information Request Form
            (Change Background)
        </div>
        <div class="content">
          <form action="signUp.php" method="post"> <!--Registration Form that adds users to database @Ramses--> 
            <div class="user-information">
              <div class="input-box">
            <!--Divider for input of: your first name @Ramses-->
                <span class="user-input">First Name</span>
                <input type="text" placeholder="Enter your first name" id="firstname" name="firstname" required>
              </div>
            <!--Divider for input of: your middle name  @Ramses-->
              <div class="input-box">
                <span class="user-input">Middle Name</span>
                <input type="text" placeholder="Enter your middle name" id="middlename" name="middlename">
              </div>
            <!--Divider for input of: your last name @Ramses-->
              <div class="input-box">
                <span class="user-input">Last Name</span>
                <input type="text" placeholder="Enter your last name" id="lastname" name="lastname" required>
              </div>
            <!--Divider for input of: your first line of their address  @Ramses-->
              <div class="input-box">
                <span class="user-input">Address 1</span>
                <input type="text" placeholder="Enter first line of your address" id="address_one" name="address_one" required>
              </div>
            <!--Divider for input of: your second line of their address @Ramses-->
              <div class="input-box">
                <span class="user-input">Address 2</span>
                <input type="text" placeholder="Enter second line of your address" id="address_two" name="address_two">
              </div>
            <!--Divider for input of: your city @Ramses-->
              <div class="input-box">
                <span class="user-input">City</span>
                <input type="text" placeholder="Enter your city" id="city" name="city" required>
              </div>
            <!--Divider for input of: your state @Ramses-->
              <div class="input-box">
                <span class="user-input">State</span>
                <input type="text" placeholder="Enter your state" id="state" name="state" required>
              </div>
            <!--Divider for input of: your zipcode @Ramses-->
              <div class="input-box">
                <span class="user-input">Zipcode</span>
                <input type="text" placeholder="Enter your zipcode" id="zipcode" name="zipcode" required>
              </div>
            <!--Divider for input of: your country of residence @Ramses-->
              <div class="input-box">
                <span class="user-input" style="display: inline; float: none;">Country Name</span>
                <select id="country" name="country" class="countries" >
                <?php
                include("includes/connect.php");
                $sql = "SELECT * FROM countries";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row['CTID']."'>".$row['country_name']."</option>";
                }
                ?>   
                </select>
              </div>
            <!--Divider for input of: your phone number @Ramses-->
              <div class="input-box">
                <span class="user-input">Phone Number</span>
                <input type="text" placeholder="Enter your phone number" id="phone_number" name="phone_number" required>
              </div>
            </div>
            <!--Divider for input of: confirmation of desire to create user @Ramses-->
            <div class="choice-user-input">
              <input type="radio" name="choice" id="dot-1" value="true" required>
              <input type="radio" name="choice" id="dot-2" value="false" checked="checked">
              <span class="choice-title">Do you consent to SUNY New Paltz contacting you regarding the application process?</span>
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
              <input type="submit" value="Register">
            </div>
          </form>
        </div>
      </div>           
    
  </div>


    <script src="navbar.js"></script>
   </body>
   <?php require('./footer.php'); ?>
</html>