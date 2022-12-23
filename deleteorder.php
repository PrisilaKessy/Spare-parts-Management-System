<?php 
include("connect.php");
 
$order_id = $_GET['order_id'];
 
//deleting the row from table
$result = mysqli_query($db, "DELETE FROM customer_order WHERE order_id=$order_id");
 
header("Location:order.php");
 ?>