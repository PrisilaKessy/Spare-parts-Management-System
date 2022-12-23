<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style1.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
  <?php include 'nav.php'; ?>

  <div class="home-content">
    <div class="customer">
      <div class="title">
        <h2>Fill Customer Details</h2>
        <?php 
        if (isset($_GET['success'])) {
    // code...

          ?>
          <p style="color:blue;text-align: center;">customer updated</p>

          <?php 
        }
        ?>
        <?php
        if (isset($_GET['error'])) {
    // code...

          ?>
          <p style="color:red; text-align: center;" >customer couldnt updated</p>

          <?php 
        }
        ?>
        <?php
        if (isset($_GET['notification'])) {
    // code...

          ?>
          <p style="color:red; text-align: center;" >fill all spaces to continue</p>

          <?php 
        }
        ?>
         ?>
   <?php 
  error_reporting(1);
 include 'connect.php';
  $customer_id=$_GET['customer_id'];

  $data=mysqli_query($db,"SELECT * FROM customer WHERE customer_id=$customer_id");

  while ($row=mysqli_fetch_array($data)) {
      $fullname=$row['fullname'];
      $email=$row['email'];
      $phone=$row['phone'];
      $city=$row['city'];
      $amount_paid=$row['amount_paid'];
      $Status=$row['Status'];
      $spare_desc=$row['spare_desc'];
      $spare_price=$row['spare_price'];
      $spare_name=$row['spare_name'];
      $duedate=$row['duedate'];
    // code...
  }
  ?>
      </div>
      <div class="row">
        <div class="col-75">
          <div class="container">
            <form action="" method="POST">

              <div class="row">
                <div class="col-50">

                  <h3>Sales onCredit Details</h3>
                   <?php 
                  if (isset($_POST['update'])) {

          $fullname = mysqli_real_escape_string($db, $_POST["fullname"]);
          $email = mysqli_real_escape_string($db, $_POST["email"]); 
          $phone = mysqli_real_escape_string($db, $_POST["phone"]);   
          $city = mysqli_real_escape_string($db, $_POST["city"]); 
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]);
          $amount_paid = mysqli_real_escape_string($db, $_POST["amount_paid"]);    
          $Status = mysqli_real_escape_string($db, $_POST["Status"]);
          $duedate = mysqli_real_escape_string($db, $_POST["duedate"]); 
 
      

if (empty($fullname)) {
    echo 'enter fullname';
    // code...
}
         else {

        $query=mysqli_query($db,"UPDATE customer SET fullname='$fullname',email='$email',phone='$phone', city='$city',spare_name='$spare_name',spare_desc='$spare_desc', spare_price='$spare_price',amount_paid='$amount_paid',Status='$Status', duedate='$duedate' WHERE customer_id=$customer_id;");
         
          if($query)  
          {  
               header('location:customer.php?success');  
          }
          else
            
                echo '<div class="error" >
                                     Registration Failed
                                      </div>'.mysqli_error($db);
         }
  
         }

?>


                  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                  <input type="text" id="fname" name="fullname" placeholder="Ramadhani Shaibu Rajabu" value="<?php echo $fullname; ?>">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="nzania@example.com" value="<?php echo $email; ?>">
                  <label for="phone"><i class="fa fa-phones"></i>Phone Number</label>
                  <input type="text" id="phone" name="phone" placeholder="0776623198" value="<?php echo $phone; ?>">
                  <label for="city"><i class="fa fa-institution"></i> Region</label>
                  <input type="text" id="city" name="city" placeholder="MWANZA" value="<?php echo $city; ?>">
                  <label for="city"><i class="fa fa-institution"></i> Spare Name</label>
                  <input type="text" id="city" name="spare_name" placeholder="Spare Name" value="<?php echo $spare_name; ?>">
                  <label for="city"><i class="fa fa-institution"></i> Spare Description</label>
                  <input type="text" name="spare_desc" placeholder="Description"  value="<?php echo $spare_desc; ?>">
                  <label for="city"><i class="fa fa-institution"></i> Spare Price</label>
                  <input type="text" name="spare_price" placeholder="30000" value="<?php echo $spare_price; ?>">
                  <label for="city"><i class="fa fa-institution"></i>Amount Paid</label>
                  <input type="text" name="amount_paid" placeholder="3000" value="<?php echo $amount_paid; ?>">
                  <label for="expyear">Status</label>
                  <select name="status" id="status">
                    <option value="Not Paid">Not Paid</option>
                    <option value="Paid">Paid</option>
                  </select>

                  <div class="row">
                    <div class="col-50">
                      <label for="state">Duedate</label>
                      <input type="date" name="duedate">
                    </div>

                  </div>
                </div>

              </div>
              <input type="submit" value="Edit onCredit" name="update" class="btn">
            </form>
          </div>
        </div>
      </div>
    </div>

        </div>
      </div>
    </div>
  </div>

      </section>

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


