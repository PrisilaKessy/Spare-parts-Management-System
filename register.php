<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
</head>
<body>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="log.css">
	<div class="title">
		<h3>NZANIA AUTOSPARE PARTS RECORDING SYSTEM</h3>
	</div>

<div class="header">
	<h2>Register</h2>
</div>
 <?php
 include 'connect.php';
                if (isset($_POST['register'])) {

                    // get data from a form
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];

                    //secure password
                    $hash = sha1($password);

                    $sql = "INSERT INTO users (username, email, phone, password) 
											VALUES ('$username', '$email', '$phone', '$hash' )";
                    $query = mysqli_query($db, $sql);

                    if ($query) {
                        echo "<b>SUCCESSFUL REGISTER</b>";
                        header('location:login.php');
                    }

                    else{
                        echo "<b>FAIL TO REGISTER REGISTER</b>";
                        header('location:register.php');
                    }
                }
                ?>


<form method="post" action="register.php">

	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="">

	</div>
	<div class="input-group">
		<label>Email</label>
<input type="email" name="email" value="">
	</div>
	<div class="input-group">
		<label>Phone</label>
		<input type="text" name="phone">
	</div>
	<div class="input-group">
		<label>password</label>
		<input type="password" name="password">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register">Register</button>
	</div>
	<p>
		Go to Dashboard? <a href="login.php" style="color:blue;text-decoration: none;">Login</a>
	</p>
</form>
</body>
</html>