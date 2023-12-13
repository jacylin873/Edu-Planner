<?php
//Label cookie name and make array to fill @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if user logged in @Ramses
if (isset($_COOKIE[$cookie_name])) {
    //Unserialize cookie and save in array @Ramses
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user is faculty
    if ($user_array['clearance'] == 1)  {
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../css/faculty/userNavbar.css">
   </head>
   <body>
   <nav id="topnav">
        <div class="wrap-nav">
        <!-- Display first name of user @Ramses-->
        <a id="majors" class="nav-link"> <h3>Faculty: <?php echo $user_array['f_name'];?></h3></a>
         <!--Navbar links for Home, Your Classes, Add Classes, and Logout @Ramses-->
        <a id="one" class="nav-link one-big" href="./facultyHome.php">Home</a>
        <a id="two" class="nav-link two-big" href="./viewClasses.php">Your Classes</a>
        <a id="three" class="nav-link three-big" href="./addClasses.php">Add Classes</a>
        <a id="four" class="nav-link four-big" href="../logout.php">Logout</a>
        <div class="dropdown">
            <button class="dropbtn" onclick="showDropDown()" >Dropdown
              <i class="fa fa-caret-down"></i>
            </button>
             <!--Dropdown options for pages mentioned in navbar @Ramses-->
            <div class="dropdown-content" onclick="hideDropDown()" id="myDropdown">
                <div class="one-small">
                    <a id="one-small-a" class="nav-link" href="./facultyHome.php">Home</a>
                </div>
                <div class="two-small">
                    <a id="two-small-a" class="nav-link" href="./viewClasses.php">Your Classes</a>
                </div>
                <div class="three-small">
                    <a id="three-small-a" class="nav-link" href="./addClasses.php">Add Classes</a>
                </div>
                <div class="four-small">
                    <a id="four-small-a" class="nav-link" href="../logout.php">Logout</a>
                </div>
            </div>
            </div>
        </div>
        </nav>
     <!--Navbar script call @Ramses-->
    <script src="../navbar.js"></script>

    </body>
    
</html>
        <?php 
    }
}
else{
    // Redirect to login if user not logged in@Ramses-
    header("Location: ../login.php");
    exit();
}
?>