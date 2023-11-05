<?php 

session_start();
$_SESSION = array();
session_unset();

session_destroy();
$cookie_name = "eduPlanner_logged_user";
setcookie($cookie_name, "", time() - 3600, "/");
header("Location: ./login.php");
?>