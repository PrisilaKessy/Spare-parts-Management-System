
<?php
error_reporting(1);
include 'connect.php';
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    
          $phone = mysqli_real_escape_string($db, $_POST["phone"]);
          $fullname = mysqli_real_escape_string($db, $_POST["fullname"]);
          $status = mysqli_real_escape_string($db, $_POST["status"]);
          $email = mysqli_real_escape_string($db, $_POST["email"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]);   
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]); 

         

            if (empty($spare_name)&&empty($spare_desc)&&empty($spare_price)&&empty($phone)&&empty($status)&&empty($fullname)&&empty($email)) {
                              header('location:order.php?notification');

                // code...
            }
     
          else {
      
           $query = "INSERT INTO customer_order (phone,fullname,status,email,spare_name,spare_desc, spare_price) VALUES('$phone','$fullname','$status','$email','$spare_name','$spare_desc', '$spare_price')";  
          if(mysqli_query($db, $query))  
          {  
               header("location:order.php?success"); 
          }
          else
            
               header("location:order.php?error"); 

  
         }
       }

      
    

   

    // Get all the submitted data from the form

?>
<script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>