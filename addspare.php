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
      $spare_price=$row['spare_price'];
      $spare_name=$row['spare_name'];
      $items=$row['items'];
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
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]);   
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]); 
          $items = mysqli_real_escape_string($db, $_POST["items"]); 
          $brand = mysqli_real_escape_string($db, $_POST["brand"]); 
          $new_item = mysqli_real_escape_string($db, $_POST["new_item"]); 
 
      

if (empty($new_item)) {
    echo 'enter items';
    // code...
}


         else {
         
           $data=mysqli_query($db,"SELECT * FROM spare WHERE spare_id=$spare_id");
           while ($res=mysqli_fetch_array($data)) {
            $items=$res['items'];
             // code...
           }


        $query=mysqli_query($db,"UPDATE spare SET items=$items+$new_item WHERE spare_id=$spare_id;");
         
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
                
                  <input type="hidden" id="price" name="items" placeholder="available items <?php echo $items; ?>"> 
                  <label for="price"> Items</label>
                  <input type="number" id="price" name="new_item" placeholder="available items <?php echo $items; ?>" > 
                  <label for="price"> Brand</label>
                  <input type="text" id="price" name="brand" value="<?php echo $brand; ?>" />
                </div>
             
                </div>
                <input type="submit" value="Add spare" name="update" class="checkout"
                />
              </form>
            </div>
          </div>
        </div>


      </div>
    
</section>


</body>
</html>

