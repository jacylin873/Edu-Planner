<?php

//Database location on server
$server = "localhost";
//Database username
$dbusername = "root";
//Database password
$password = "";
//Database name
$db = "edu_planner";
//Check for debug
$debug = "true";

$conn = mysqli_connect($server, $dbusername, $password, $db);

if ($conn->connect_error){
    die('Could not connect:'.$db.conn->connect_error);
}

//elseif($debug == "true"){
//    echo nl2br("\nDEBUG:\n");
//    echo nl2br("3 \n 2 \n 1...");
//    echo nl2br("\nConnected Successfully\n");
//}

?>