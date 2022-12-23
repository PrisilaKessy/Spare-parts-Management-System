<?php
include"connect.php";
$sql =" select count(order_id) as count from customer_order";

$q = mysqli_query($db, $sql);
 
while($row = mysqli_fetch_assoc($q)){
  $total_orders = $row['count'];
}

$sql =" select sum(spare_price) as total from sales";

$q = mysqli_query($db, $sql);
 
while($row = mysqli_fetch_assoc($q)){
  $total_sales = $row['total'];
}

$sql =" select sum(spare_price) as total from customer";

$q = mysqli_query($db, $sql);
 
while($row = mysqli_fetch_assoc($q)){
  $total_onCredit = $row['total'];
}

$total_profit=$total_onCredit - $total_sales;