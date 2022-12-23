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
      <h1 style="text-align: center;">Purchases Details</h1>
      <div class="Fields">
        <div>
          <div class="formContainer">
            <?php
  if (isset($_GET['success'])) {
    // code...
  
  ?>
  <p style="color:blue;text-align: center;">purchases edited</p>

  <?php 
  }
  ?>
   <?php
  if (isset($_GET['error'])) {
    // code...
  
  ?>
  <p style="color:red; text-align: center;" >purchases couldnt edited</p>

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
   <?php 
  error_reporting(1);
 include 'connect.php';
  $spare_id=$_GET['spare_id'];

  $data=mysqli_query($db,"SELECT * FROM spare WHERE spare_id=$spare_id");

  while ($row=mysqli_fetch_array($data)) {
      $payment=$row['payment'];
      $spare_desc=$row['spare_desc'];
      $items=$row['items'];
       $spare_price=$row['spare_price'];
      $spare_name=$row['spare_name'];
      $brand=$row['brand'];
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
          $items = mysqli_real_escape_string($db, $_POST["items"]);  
                    $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]);   
 
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]); 
          $brand = mysqli_real_escape_string($db, $_POST["brand"]); 
 
      

if (empty($brand)) {
    echo 'enter brand';
    // code...
}
         else {

        $query=mysqli_query($db,"UPDATE spare SET payment='$payment',items='$items',spare_price='$spare_price',spare_desc='$spare_desc', spare_name='$spare_name',brand='$brand' WHERE spare_id=$spare_id;");
         
          if($query)  
          {  
               header('location:purchases.php?success');  
          }
          else
            
                echo '<div class="error" >
                                     Registration Failed
                                      </div>'.mysqli_error($db);
         }
  
         }

?>
                  <label for="spname">Spare Name</label>
                  <input type="text" id="spname" name="spare_name" value="<?php echo $spare_name; ?>" />
                  <label for="desription">Spare Description</label>
                  <input type="text" id="desc" name="spare_desc" value="<?php echo $spare_desc; ?>" />
                  <label for="price"> Price</label>
                  <input type="text" id="price" name="items" value="<?php echo $items; ?>" />
                  <label for="price"> Price</label>
                  <input type="text" id="price" name="spare_price" value="<?php echo $spare_price; ?>" />
                  <label for="price"> Brand</label>
                  <input type="text" id="price" name="brand" value="<?php echo $brand; ?>" />
                </div>
                <div>
                  <h3>Payment method</h3>
                  <label for="expyear">Payment Method</label>
                  <select name="payment" id="payment">
                    <option value="M-pesa">M-pesa</option>
                    <option value="Tigo-pesa">Tigo-pesa</option>
                    <option value="Halopesa">Halopesa</option>
                    <option value=">Aitel-money">Aitel-money</option>
                  </select>
                  <div class="Fields">
                    <div>
                      <label for="expyear">Status</label>
                    <select name="status" id="status">
                      <option value="Paid">Paid</option>
                      <option value="Brocked/damage">Brocked/damage</option>
                      <option value="Returned">Returned</option>
                    </select>
                    </div>
                    </div>
                  </div>
                </div>
                <input type="submit" value="EditPurchases" name="update" class="checkout"
                />
              </form>
            </div>
          </div>
        </div>


      </div>
    
</section>


</body>
</html>

