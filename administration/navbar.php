<?php
//Include database connection and start session @Ramses
include("../includes/connect.php");
//Define cookie name and create array @Ramses
$cookie_name = "eduPlanner_logged_user";
$user_array;
//Check if cookie exists @Ramses
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    //Check if user has faculty clearence @Ramses
    if ($user_array['clearance'] == 0)  {
        ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../css/admin/userNavbar.css">
   </head>
   <body>
   <nav id="topnav">
        <div class="wrap-nav">
        <!-- @Show admin name @Ramses-->
        <a id="majors" class="nav-link" href=""> <h3>Admin: <?php echo $user_array['f_name'];?></h3></a>
        <!--Show Home, Create User, Manage Faculty, Manage Classes, and Logout in navbar @Ramses-->
        <a id="one" class="nav-link one-big" href="./AdminHome.php">Home</a>
        <a id="two" class="nav-link two-big" href="./newUser.php">Create User</a>
        <a id="three" class="nav-link three-big" href="./facultyManage.php">Manage Faculty</a>
        <a id="four" class="nav-link four-big" href="./classManage.php">Manage Classes</a>
        <a id="five" class="nav-link five-big" href="../logout.php">Logout</a>
        <div class="dropdown">
            <button class="dropbtn" onclick="showDropDown()" >Dropdown
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" onclick="hideDropDown()" id="myDropdown">
            <!--Show the navbar options as a dropdown @Ramses-->
                <div class="one-small">
                    <a id="one-small-a" class="nav-link" href="./AdminHome.php">Home</a>
                </div>
                <div class="two-small">
                    <a id="two-small-a" class="nav-link" href="./newUser.php">Create User</a>
                </div>
                <div class="three-small">
                    <a id="three-small-a" class="nav-link" href="./facultyManage.php">Manage Faculty</a>
                </div>
                <div class="four-small">
                    <a id="four-small-a" class="nav-link" href="./classManage.php">Manage Classes</a>
                </div>
                <div class="five-small">
                    <a id="five-small-a" class="nav-link" href="../logout.php">Logout</a>
                </div>
                

            </div>
            </div>
        </div>
    </nav>
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