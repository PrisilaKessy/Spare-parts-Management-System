<?php
if(!isset($_SESSION)) { 
	session_start(); 
} 
 // start the session
	include 'connect.php'; // DB CONNECTION

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$pass = $_POST['password'];
            //secure password but this step is important you have secure the password the first time you insert (during sign up process)
            //otherwise don't secure it but it is important to know according to your level
		$hash = sha1($pass);

		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hash'";
		$query = mysqli_query($db, $sql);

		if ($query) {
			if (mysqli_num_rows($query) > 0) {
				$row = mysqli_fetch_array($query);
//session creation to support AUTHORIZATION process
				$_SESSION['id'] = $row['user_id'];
				$_SESSION['user_type'] = $row['user_type'];
					$_SESSION['username'] = $row['username']; // this session id will store uid of the user from a db
					$_SESSION['email'] = $row['email']; // this session role will store role of the user from a db
					


                    // AUTHORIZAION SUPPORTED BY SESSION AND REDIRECT TO DIFFERENT PAGES
					
                    //if the role is === to admin then go to....... 
					if ($_SESSION['user_type'] === 'admin') {
						header("location: admin.php");
					} 
					
				} 
				else {
					echo "<div><strong>Error:</strong><h5> Wrong PASSWORD or USERNAME.</h5></div>";
					header('location:login.php');
				}
			} 
			else {
				die(mysqli_error($db));
			}
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>
	<div class="title">
		<h3>NZANIA AUTOSPARE PARTS RECORDING SYSTEM</h3>
	</div>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="">


		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		<p>
			If you dont have login credintials? <a href="register.php" style="color:blue; text-decoration: none;" >Sign up</a>
		</p>
	</form>
</body>
</html>
