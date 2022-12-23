<?php 
$username = "";
$error=array();

$db = mysqli_connect('localhost', 'root', '','AWMS');

if (!$db) 

echo "connection failed".mysqli_error($db);



 ?>