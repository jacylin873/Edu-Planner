<?php
//$path = '/includes';
//set_include_path(get_include_path() . PATH_SEPARATOR . $path);

//Database location on server.
$server = "localhost";
//Database user name. Use root for now.
$dbusername = "root";
//Database password leave blank for now.
$password = "";
//Database name.
$db = "starter";
//Can use to create your own debug. Leave true to show if you connect then change to false.
$debug = "true";

//Set up the database connector
$dbconn = mysqli_connect($server, $dbusername, $password, $db);

//Show errors if connection failed
if ($dbconn->connect_error) {
    die('Could not connect: ' . $dbconn->connect_error);
}
//Use for custom error handle with $debug above.
elseif($debug == "true"){
	echo nl2br("\nDEBUG:\n");
	echo nl2br("3 \n 2 \n 1...");
	echo nl2br("\n Connected successfully\n");
}

//You can use the command below to set the default database to another db.
//mysqli_select_db($dbconn, "webiii");

?>