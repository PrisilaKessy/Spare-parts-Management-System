<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="table.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
  <?php
session_start();
// Check if not logged in, return to login
if(!isset($_SESSION['id']) || !isset($_SESSION['user_type'])){
  header('location: login.php');
}
// To check if the user who access the page is correct one 
//for example in this page user who suppose to access this web page is admin
  if($_SESSION['user_type'] !== 'admin'){ 
        header("location: login.php");
}
?>

  <div class="sidebar">
    <div class="logo-details">
      <i class="fa fa-car" aria-hidden="true"></i>
      <span class="logo_name">Nzania AutoSpare 
      </span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="sparelist.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Spare List</span>
          </a>
        </li>
        <li>
          <a href="viewsales.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Sales</span>
          </a>
        </li>
        <li>
          <a href="purchases.php">
            <i class='bx bx-pie-chart' ></i>
            <span class="links_name">Purchases</span>
          </a>
        </li>
        <li>
          <a href="order.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Order List</span>
          </a>
        </li>
        <li>
          <a href="customer.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Customer</span>
          </a>
        </li>
        <li>
          <a href="report.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">

    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
     s
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Welcome @<?php echo $_SESSION['username'] ;?></span>
        <i class='bx bx-user' ></i>
      </div>
    </nav>
    <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>


</body>
</html>