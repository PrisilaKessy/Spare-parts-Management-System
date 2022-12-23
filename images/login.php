<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login_action.php">

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
