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
      <h1 style="text-align: center;">Selling Details</h1>
      <div class="Fields">
        <div class="formContainer">
          <?php
  if (isset($_GET['success'])) {
    // code...
  
  ?>
  <p style="color:blue;text-align: center;">spare updated</p>

  <?php 
  }
  ?>
   <?php
  if (isset($_GET['error'])) {
    // code...
  
  ?>
  <p style="color:red; text-align: center;" >spare couldnt updated</p>

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
  $sales_id=$_GET['sales_id'];

  $data=mysqli_query($db,"SELECT * FROM sales WHERE sales_id=$sales_id");

  while ($row=mysqli_fetch_array($data)) {
      $payment=$row['payment'];
      $spare_desc=$row['spare_desc'];
      $spare_price=$row['spare_price'];
      $spare_name=$row['spare_name'];
      $items=$row['items'];
      $status=$row['status'];
         $amount=$row['amount'];
    // code...
  }
  ?>
            <form action="" method="POST">
              <div class="Fields">
                <div>
                  <h3>Spare Details</h3>
                  <?php 
                  if (isset($_POST['update'])) {

          $payment = mysqli_real_escape_string($db, $_POST["payment"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]);   
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]); 
          $items = mysqli_real_escape_string($db, $_POST["items"]); 
          $status = mysqli_real_escape_string($db, $_POST["status"]); 
           $amount = mysqli_real_escape_string($db, $_POST["amount"]);  
      

if (empty($amount)) {
    echo 'enter amount';
    // code...
}
         else {

        $query=mysqli_query($db,"UPDATE sales SET payment='$payment',spare_price='$spare_price',spare_desc='$spare_desc', spare_name='$spare_name',items='$items',status='$status',amount='$amount' WHERE sales_id=$sales_id;");
         
          if($query)  
          {  
               header('location:viewsales.php?success');  
          }
          else
            
                echo '<div class="error" >
                                     Registration Failed
                                      </div>'.mysqli_error($db);
         }
  
         }

      
    

  

    // Get all the submitted data from the form

?>
                  <label for="spname">Spare Name</label>
                  <input type="text" id="spname" name="spare_name" value="<?php echo $spare_name; ?>" />
                  <label for="desription">Spare Description</label>
                  <input type="text" id="desc" name="spare_desc" value="<?php echo $spare_desc; ?> " />
                  <label for="price"> Price</label>
                  <input type="text" id="price" name="spare_price" value="<?php echo $spare_price; ?>"  />
                  <label for="price"> Items</label>
                  <input type="text" id="price" name="items" value="<?php echo $items; ?>" />
                  <label for="price"> Amount</label>
                  <input type="text" id="price" name="amount"/>
                </div>

                <div class="Fields">
                  <div>
                   <label for="expyear">Payment Method</label>
                    <select name="payment" id="payment">
                      <option value="M-pesa">M-pesa</option>
                      <option value="Tigo-pesa">Tigo-pesa</option>
                      <option value="Halopesa">Halopesa</option>
                      <option value="Aitel-money">Aitel-money</option>
                    </select>
                    <label for="expyear">Status</label>
                    <select name="status" id="stutus">
                      <option value="Paid">Paid</option>
                      <option value="Paid a half">Paid a half</option>
                      <option value="Not Paid">Not Paid</option>
                    </select>
                  </div>
                  </div>
                </div>
              <input type="submit" value="Edit" name="update" class="checkout"
              />
            </form>
          </div>
        </div>
      </div>
     
</section>



</body>
</html>

