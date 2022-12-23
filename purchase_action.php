
<?php
error_reporting(1);
include 'connect.php';
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    
          $brand = mysqli_real_escape_string($db, $_POST["brand"]);
          $status = mysqli_real_escape_string($db, $_POST["status"]);
          $payment = mysqli_real_escape_string($db, $_POST["payment"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]);   
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]); 

            if (empty($spare_name)&&empty($spare_desc)&&empty($spare_price)) {
              header('location:purchases.php?notification');
              // code...
            }
     
          else {
      
           $query = "INSERT INTO spare (brand,payment,spare_name,spare_desc, spare_price,status) VALUES('$brand','$payment','$spare_name','$spare_desc','$spare_price','$status')";  
          if(mysqli_query($db, $query))  
          {  
               header("location:purchases.php?success"); 
          }
          else
            
               header("location:purchases.php?error"); 

  
         }
       }

      
    

   

    // Get all the submitted data from the form

?>
<script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>