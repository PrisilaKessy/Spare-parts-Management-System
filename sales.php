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

          <?php
  if (isset($_GET['success'])) {
    // code...
  
  ?>
  <p style="color:blue;text-align: center;">spare sold</p>

  <?php 
  }
  ?>
   <?php
  if (isset($_GET['error'])) {
    // code...
  
  ?>
  <p style="color:red; text-align: center;" >spare couldnt sold</p>

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

  <div class="home-content">

    <div class="sales">
      <h1 style="text-align: center;">Selling Details</h1>
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
                   <?php 
                  if (isset($_POST['upload'])) {

          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]);
          $payment = mysqli_real_escape_string($db, $_POST["payment"]);
          $amount = mysqli_real_escape_string($db, $_POST["amount"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]); 
          //$items = mysqli_real_escape_string($db, $_POST["items"]); 
          $status = mysqli_real_escape_string($db, $_POST["status"]);
          $new_items = mysqli_real_escape_string($db, $_POST["new_items"]); 

if (empty($new_items)) {
    echo 'enter items';
    // code...
}

         else {
         
           $data=mysqli_query($db,"SELECT * FROM spare WHERE spare_id=$spare_id");
           while ($res=mysqli_fetch_array($data)) {
            $items=$res['items'];
             // code...
           }

        $query=mysqli_query($db,"UPDATE spare SET items=$items-$new_items WHERE spare_id=$spare_id;");
        $data=mysqli_query($db,"INSERT INTO sales (spare_name,payment,amount,spare_desc,spare_price,new_items,status) VALUES ('$spare_name','$payment','$amount','$spare_desc','$spare_price','$new_items','$status') ");
         
          if($query&&$data)  
          {  
               header('location:sparelist.php?success');  
          }
          else
            
                echo '<div class="error" >
                                     Registration Failed
                                      </div>'.mysqli_error($db);
         }
  
         }

?>
            <form action="" method="POST">
              <div class="Fields">
                <div>
      <h1 style="text-align: center;">Selling Details</h1>
                  <label for="spname">Spare Name</label>
                  <input type="text" id="spname" name="spare_name" value="<?php echo $spare_name; ?>" />
                  <label for="desription">Spare Description</label>
                  <input type="text" id="desc" name="spare_desc" value="<?php echo $spare_desc; ?> " />
                  <!--dealing with -->
                  <!--input type="hidden" id="price" name="items" placeholder="available items <//?php echo $items; ?>"-->             
                  <label for="price"> Price</label>
                  <input type="text" id="spare_price" name="spare_price"  value=" <?php echo $spare_price; ?>"  />
                  <label for="price"> Items</label>
                  <input type="number" id="new_items" name="new_items" placeholder="available items" onchange="calculateAmount(this.value)" required <?php echo $items; ?>" > 
                  <!--input type="hidden" id="price" placeholder="items availabe <?php// echo $items; ?>" name="items"/-->
                  <label for="price"> Amount</label>
                  <input id="amount" placeholder="enter total amount" name="amount" type="number" readonly >
                  <script>
                    function calculateAmount(val) {
                        var tot_price = val * <?php echo $spare_price; ?>;
                        var divobj = document.getElementById('amount');
                        divobj.value = tot_price;
                       }
                  </script>
                  <!--dealing with -->
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
                      <option value=" Paid 0.5">Paid a half</option>
                      <option value="Not Paid ">Not Paid</option>
                    </select>
                  </div>
                  </div>
                </div>
              <input type="submit" value="Sell" name="upload" class="checkout"
              />
            </form>
          </div>
        </div>
      </div>
    <div class="sales-boxes">
      <div class="recent-sales box">
        <div class="title">Recent Sales</div>
        <div class="sales-details">
          
   </div>
 </div>
</div>
</section>



</body>
</html>

