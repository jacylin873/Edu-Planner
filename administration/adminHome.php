<?php 
session_start();
$cookie_name = "eduPlanner_logged_user";
$user_array;
if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);
    
    // Now, $arrayData contains the original array.

    if ($user_array['clearence'] == 0)  {

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>HOME</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <h1>Hello, <?php echo $_SESSION['f_name'];?> You are a admin member!</h1>
            <a href="../logout.php">Logout</a>
            <form action = "register.php">
              <button>Sign Up</button>
            </form>
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