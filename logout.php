<?php 
include 'connect.php';

	session_destroy();
	unset($_SESSION['user_type']);
	header("location: login.php");

?>