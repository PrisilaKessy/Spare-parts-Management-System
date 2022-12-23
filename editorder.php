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
    <div class="sales">
      <h1 style="text-align: center;">Order Details</h1>
      <div class="Fields">
        <div>
          <div class="formContainer">
            <?php
            if (isset($_GET['success'])) {
    // code...

              ?>
              <p style="color:blue;text-align: center;">spare order updated</p>

              <?php 
            }
            ?>
            <?php
            if (isset($_GET['error'])) {
    // code...

              ?>
              <p style="color:red; text-align: center;" >spare order couldnt updated</p>

              <?php 
            }
            ?>
            <?php
            if (isset($_GET['notification'])) {
    // code...

              ?>
              <p style="color:red; text-align: center;" >fill all fields to proceed</p>

              <?php 
            }
            ?>
            <?php 
  error_reporting(1);
 include 'connect.php';
  $order_id=$_GET['order_id'];

  $data=mysqli_query($db,"SELECT * FROM customer_order WHERE order_id=$order_id");

  while ($row=mysqli_fetch_array($data)) {
      $fullname=$row['fullname'];
      $spare_desc=$row['spare_desc'];
      $spare_price=$row['spare_price'];
      $spare_name=$row['spare_name'];
      $email=$row['email'];
      $status=$row['status'];
      $phone=$row['phone'];
    // code...
  }
  ?>
            <form action="" method="POST">
              <div class="Fields">
                <div>
                  <h3>Customer Details</h3>
                   <?php 
                  if (isset($_POST['update'])) {

          $fullname = mysqli_real_escape_string($db, $_POST["fullname"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]);   
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]); 
          $email = mysqli_real_escape_string($db, $_POST["email"]); 
           $status = mysqli_real_escape_string($db, $_POST["status"]);
           $phone = mysqli_real_escape_string($db, $_POST["phone"]);
 
      

if (empty($email)) {
    echo 'enter email';
    // code...
}
         else {

        $query=mysqli_query($db,"UPDATE customer_order SET fullname='$fullname',spare_price='$spare_price',spare_desc='$spare_desc', spare_name='$spare_name',status='$status',email='$email',phone='$phone' WHERE order_id=$order_id;");
         
          if($query)  
          {  
               header('location:order.php?success');  
          }
          else
            
                echo '<div class="error" >
                                     Registration Failed
                                      </div>'.mysqli_error($db);
         }
  
         }

?>
                  <label for="fname">Full Name</label>
                  <input type="text" id="fname" name="fullname" value="<?php echo $fullname; ?>" />
                  <label for="email"> Email</label>
                  <input type="text" id="email" name="email" value="<?php echo $email; ?>" />
                  <label for="adr"> Phone Number</label>
                  <input type="text" id="phone" name="phone"  value="<?php echo $phone; ?>" />
                </div>
                <div>
                  <h3>Spare Details</h3>
                  <label for="spname">Spare Name</label>
                  <input type="text" id="spname" name="spare_name" value="<?php echo $spare_name; ?>" />
                  <label for="desription">Spare Description</label>
                  <input type="text" id="desc" name="spare_desc" value="<?php echo $spare_desc; ?>" />
                  <label for="price"> Price</label>
                  <input type="text" id="price" name="spare_price" value="<?php echo $spare_price; ?>" />
                </div>
                <div>
                  <div class="Fields">
                    <div>
                      <label for="expyear">Status</label>
                      <select name="status" id="status">
                        <option value="Complete">Complete</option>
                        <option value="Pending">Pending</option>
                        <option value="Canceled">Canceled</option>
                      </select></div>

                    </div>
                  </div>
                </div>
                <input type="submit" value="Update Order" name="update" class="checkout"
                />
              </form>
            </div>
          </div>
        </div>


      </div>
      
      </div>
    </section>



  </body>
  </html>

