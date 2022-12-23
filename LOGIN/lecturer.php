<?php
session_start();
// Check if not logged in, return to login
if(!isset($_SESSION['id']) || !isset($_SESSION['role'])){
	header('location: login.php');
}
// To check if the user who access the page is correct one 
//for example in this page user who suppose to access this page is lecturer
	if($_SESSION['role'] !== 'lecturer'){ 
        header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> page to show how to use session to welcome someone</title>
</head>
<body>
<h1>Welcome  <?php echo $_SESSION['first'] ;?>  <?php echo $_SESSION['middle'] ;?>  <?php echo $_SESSION['last']?> <b><?php echo $_SESSION['number'] ; ?></b></h1>
</body>

</html>