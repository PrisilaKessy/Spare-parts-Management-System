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