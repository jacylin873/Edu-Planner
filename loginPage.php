<!DOCTYPE html>
<html lang="en">
    <!-- The beginning steps (header) of declaring a HTML/PHP website (Jacy) -->
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- The title to the website that shows up on the navigation bar (Jacy) -->
      <title>Edu Planner</title>

      <!-- Links the CSS file to the PHP file (Jacy) -->
      <link rel="stylesheet" href="css/loginPage.css">
    </head>
    <!-- Body code for the structure of the website (Jacy) -->
    <body>
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
    
    if ($user_array['clearance'] == 0){
      header("Location: ./administration/adminHome.php");
      exit();
      }                
    else if ($user_array['clearance'] == 1){
      header("Location: ./faculty/facultyHome.php");
      exit();
      }                
    else if ($user_array['clearance'] == 2){
      header("Location: ./student/studentHome.php");
      exit();
    }
} else {
  
}
    ?>
    </html>

