<?php 
//Define name of cookie and declare an array to store its info @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Unserialize cookie data
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user clearence is that of student @Ramses
    if ($user_array['clearance'] == 2)  {
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../css/student/userNavbar.css">
   </head>
   <body>
        <nav id="topnav">
        <div class="wrap-nav">
        <!--Show student first name  @Ramses-->
        <a id="majors" class="nav-link" href=""> <h3>Student: <?php echo $user_array['f_name'];?></h3></a>
        <!--Give nav options for Home, Calendar, Schedule Planner, and Logout  @Ramses-->
        <a id="one" class="nav-link one-big" href="./studentHome.php">Home</a>
        <a id="two" class="nav-link two-big" href="./calendar.php">Calendar</a>
        <a id="three" class="nav-link three-big" href="./schedulePlanner.php">Schedule Planner</a>
        <a id="four" class="nav-link four-big" href="../logout.php">Logout</a>
        <!--Give same options but as a dropdown  @Ramses-->
        <div class="dropdown">
            <button class="dropbtn" onclick="showDropDown()" >Dropdown
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" onclick="hideDropDown()" id="myDropdown">
                <div class="one-small">
                    <a id="one-small-a" class="nav-link" href="./studentHome.php">Home</a>
                </div>
                <div class="two-small">
                    <a id="two-small-a" class="nav-link" href="./calendar.php">Calendar</a>
                </div>
                <div class="three-small">
                    <a id="three-small-a" class="nav-link" href="./schedulePlanner.php">Schedule Planner</a>
                </div>
                <div class="four-small">
                    <a id="four-small-a" class="nav-link" href="../logout.php">Logout</a>
                </div>
            </div>
            </div>
        </div>
        </nav>
    <!--Include navbar Javascript @Ramses -->  
    <script src="../navbar.js"></script>
    </body>
        </html>
        <?php 
    }
}
else{
    //Return to login page if cookie is not set @Ramses
    header("Location: ../login.php");
    exit();
}
?>