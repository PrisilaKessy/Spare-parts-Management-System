<?php 
//including the database connection file
include("connect.php");
 
//getting id of the data from url
$customer_id = $_GET['customer_id'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM customer WHERE customer_id=$customer_id");
 
//redirecting to the display page (index.php in our case)
header("Location:customer.php");
 ?>