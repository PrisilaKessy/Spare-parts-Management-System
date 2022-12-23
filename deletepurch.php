<?php 
//including the database connection file
include("connect.php");
 
//getting id of the data from url
$spare_id = $_GET['spare_id'];
 
//deleting the row from table
$result = mysqli_query($db, "DELETE FROM spare WHERE spare_id=$spare_id");
 
//redirecting to the display page (index.php in our case)
header("Location:purchases.php");
 ?>