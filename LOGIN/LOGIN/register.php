<?php

require('connection.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>REGISTER PAGE (IT CONSISTS OF FORM AND ACTION PAGE)</title>

</head>

<body>


                <?php
                if (isset($_POST['register'])) {

                    // get data from a form
                    $regno = $_POST['enrollNo'];
                    $fname = $_POST['first'];
                    $mname = $_POST['middle'];
                    $lname = $_POST['last'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $role = $_POST['role'];

                    //secure password
                    $hash = sha1($password);

                    $sql = "INSERT INTO users (enrollNo, fname, mname, lname, email, password, role) 
											VALUES ('$regno', '$fname', '$mname', '$lname', '$email', '$hash', '$role')";
                    $query = mysqli_query($con, $sql);

                    if ($query) {
                        echo "<b>SUCCESSFUL REGISTER</b>";
                    }

                    else{
                        echo "<b>FAIL TO REGISTER REGISTER</b>";
                    }
                }
                ?>




                <form method="post" action="register.php">

                        <br>
                        <br>
                            <label>First Name</label>
                            <input type="text" required placeholder="First name" name="first">
                    

                        <br>
                        <br>
                            <label>Middle Name</label>
                            <input type="text" required placeholder="Middle name" name="middle">

                        <br>
                        <br>
                            <label>Last Name</label>
                            <input type="text" required placeholder="Last Name" name="last">

                        <br>
                        <br>
                            <label>Enroll Number</label>
                            <input type="text" required placeholder="Enter enroll Number" name="enrollNo">
        

                        <br>
                        <br>
                            <label>Email</label>
                            <input type="email" required placeholder="Email" name="email">
                        

                        <br>
                        <br>
                            <label>Password</label>
                            <input type="password" required placeholder="Password" name="password">

                        <br>
                        <br>

                            <select name="role">
                                <option>Select role..</option>
                                <option>student</option>
                                <option>lecturer</option>
                                
                            </select>

                            <br>
                            <br>
                            <input type="submit" name="register" value="REGISTER">
                </form>
                        <p> if you hav an account <a href="login.php">press here </a>to loginin</p>


</body>
</html>