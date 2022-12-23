<?php 
//including the database connection file
include("connect.php");
 
//getting id of the data from url
$sales_id = $_GET['sales_id'];
 
//deleting the row from table
$result = mysqli_query($db, "DELETE FROM sales WHERE sales_id=$sales_id");
 
//redirecting to the display page (index.php in our case)
header("Location:viewsales.php");
 ?>