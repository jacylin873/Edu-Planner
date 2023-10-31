<!DOCTYPE html>
<html>
   <head>
   <!-- The beginning steps (header) of declaring a HTML/PHP website (Jacy) -->
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- The title to the website that shows up on the navigation bar (Jacy) -->
      <title>Edu Planner</title>
      <!-- Links the CSS file to the PHP file (Jacy) -->
      <link rel="stylesheet" href="css/navbar.css">
      <link rel="stylesheet" href="css/studentlogin.css">
   </head>
   <!-- Body code for the structure of the website (Jacy) -->
   <body style="">
    
    <nav id="topnav">
        <div class="wrap-nav">
        <div class="image-container">
            <a id="home" class="nav-img" href="./index.php"><img class= "nav-img" src="./img/newpaltzlogo.jpg" alt="Home"></a>
            <div class="alt-text">Home</div>
          </div>
        <a id="majors" class="nav-link" href="./majors.php">Majors</a>
        <a id="apply" class="nav-link apply-big" href="./apply.php">Apply</a>

        <a id="login" class="nav-link login-big" href="./login.php">Login</a>
        <a id="staff" class="nav-link staff-big" href="./staff.php">Staff</a>
        <div class="dropdown">
            <button class="dropbtn" onmouseover="showDropDown()" >Dropdown
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" onmouseout="hideDropDown()" id="myDropdown" >
                <div class="apply-small">
                    <a id="apply-small-a" class="nav-link" href="./apply.php">Apply</a>
                </div>
                <div class="login-small">
                    <a id="login-small-a" class="nav-link" href="./studentlogin.php">Login</a>
                </div>
                <div class="staff-small">
                    <a id="staff-small-a" class="nav-link" href="./staff.php">Staff</a>
                </div>

            </div>
            </div>
        </div>
      </nav>
    
      


        <!-- Div class code for Login title and Username Box (Jacy) -->
        <div class="login-box">
            <h2>Login</h2>
            <form action="./includes/loginPageArithmetic.php" method="post">
            <div class="user-box">
              <input type="text" name="user_email" placeholder="email address">
              <label>Email</label>
            </div>
            <!-- Div class clode the the Password Box (Jacy) -->
            <div class="user-box">
              <input type="password" name="user_password" placeholder="password">
              <label>Password</label>
            </div>
            <div> 
            <?php 
              if (isset($_GET['error'])) { ?>
              <h2 class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            </div>

            <!-- Submission box for inputing Username and Password (Jacy) -->
            <input type="submit" name="submit">
            </form>
            <form action = "register.php">
              <button>Sign Up</button>
            </form>
        </div>
    </body>
    </style>
    <?php
$cookie_name = "eduPlanner_logged_user";
if (isset($_COOKIE[$cookie_name])) {
    $cookie_value = $_COOKIE[$cookie_name];
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    echo "<script>alert('User already logged in; redirecting now.');</script>";
    
    if ($user_array['clearence'] == 0){
      header("Location: ./administration/adminHome.php");
      exit();
      }                
    else if ($user_array['clearence'] == 1){
      header("Location: ./faculty/facultyHome.php");
      exit();
      }                
    else if ($user_array['clearence'] == 2){
      header("Location: ./student/studentHome.php");
      exit();
    }
} else {
  
}
    ?>



    <script src="navbar.js"></script>
   </body>

</html>