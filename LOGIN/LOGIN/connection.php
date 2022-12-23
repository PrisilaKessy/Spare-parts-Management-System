<?php
//connection to db
$db = "loginDB";
$user = "root";
$pwd = "";
$host = "localhost";

$con = mysqli_connect($host, $user,  $pwd, $db);

if(mysqli_connect_error()){
	echo "Failed to establish database connection.";
	die();
}

?>