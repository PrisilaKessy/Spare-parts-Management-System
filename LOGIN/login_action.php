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