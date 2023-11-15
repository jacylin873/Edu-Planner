<?php 
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
      <link rel="stylesheet" href="../css/userNavbar.css">
   </head>
   <body>
   <nav id="topnav">
        <div class="wrap-nav">
        <a id="majors" class="nav-link" href="./admininfo.php"> <h3>Admin: <?php echo $user_array['f_name'];?></h3></a>
        <a id="one" class="nav-link one-big" href="./AdminHome.php">Home</a>
        <a id="two" class="nav-link two-big" href="./newUser.php">Create User</a>

        <a id="three" class="nav-link three-big" href="./studentManage.php">Manage Students</a>
        <a id="four" class="nav-link four-big" href="./facultyManage.php">Manage Faculty</a>
        <a id="five" class="nav-link five-big" href="./classManage.php">Manage Classes</a>
        <a id="six" class="nav-link six-big" href="../logout.php">Logout</a>
        <div class="dropdown">
            <button class="dropbtn" onclick="showDropDown()" >Dropdown
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" onclick="hideDropDown()" id="myDropdown">
                <div class="one-small">
                    <a id="one-small-a" class="nav-link" href="./AdminHome.php">Home</a>
                </div>
                <div class="two-small">
                    <a id="two-small-a" class="nav-link" href="./newUser.php">Create User</a>
                </div>
                <div class="three-small">
                    <a id="three-small-a" class="nav-link" href="./studentManage.php">Manage Students</a>
                </div>
                <div class="four-small">
                    <a id="four-small-a" class="nav-link" href="./facultyManage.php">Manage Faculty</a>
                </div>
                <div class="five-small">
                    <a id="five-small-a" class="nav-link" href="./classManage.php">Manage Classes</a>
                </div>
                <div class="six-small">
                    <a id="six-small-a" class="nav-link" href="../logout.php">Logout</a>
                </div>
                

            </div>
            </div>
        </div>
    </nav>
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