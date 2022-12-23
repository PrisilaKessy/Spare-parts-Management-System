<!DOCTYPE html>
<html>

<head>
	<title>Login Action Page With Embeded Loin Form</title>
</head>

<body>
	<?php
	session_start(); // start the session
	include 'connection.php'; // DB CONNECTION

		if (isset($_POST['submit'])) {
			$reg = $_POST['enrollNo'];
			$pass = $_POST['password'];
            //secure password but this step is important you have secure the password the first time you insert (during sign up process)
            //otherwise don't secure it but it is important to know according to your level
			$hash = sha1($pass);

			$sql = "SELECT * FROM users WHERE enrollNo = '$reg' AND password = '$hash'";
			$query = mysqli_query($con, $sql);

			if ($query) {
				if (mysqli_num_rows($query) > 0) {
					$row = mysqli_fetch_array($query);
//session creation to support AUTHORIZATION process
					$_SESSION['id'] = $row['uid']; // this session id will store uid of the user from a db
					$_SESSION['role'] = $row['role']; // this session role will store role of the user from a db
					$_SESSION['number'] = $row['enrollNo']; // this session number will store enroll no of the user from a db
					$_SESSION['first'] = $row['fname']; // this session first will store fname of the user from a db
					$_SESSION['middle'] = $row['mname']; // this session middle will store mname of the user from a db
					$_SESSION['last'] = $row['lname']; // this session last will store lname of the user from a db


                    // AUTHORIZAION SUPPORTED BY SESSION AND REDIRECT TO DIFFERENT PAGES
                    
                    //if the role is === to admin then go to....... 
					if ($_SESSION['role'] === 'admin') {
						header("location: admin.php");
					} 
                    //if the role is === to lecturer then go to....... 
                    else if ($_SESSION['role'] === 'lecturer') {
						header("location: lecturer.php");
					} 
                    //if the role is === to student then go to....... 
                    else if ($_SESSION['role'] === 'student') {
						header("location: student.php");
					}
				} 
                else {
					echo "<div><strong>Error:</strong><h5> Wrong PASSWORD or USERNAME.</h5></div>";
				}
			} 
            else {
				die(mysqli_error($con));
			}
		}
		?>

<!-- LOGIN FORM -->
		<form class="mt-4" method="post" action="login.php">
			<br>
				<input type="text" name="enrollNo" required placeholder="Username" />
			<br>

			<br>
			<br>
				<input type="password" name="password" required placeholder="Password" />
			<br>
			<br>

			<br>
			<br>
				<button type="submit" class="btn btn-login" name="submit">Login</button>


		</form>
</body>

</html>