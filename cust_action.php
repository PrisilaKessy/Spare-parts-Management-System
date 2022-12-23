
<?php
error_reporting(1);
include 'connect.php';
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    
          $fullname = mysqli_real_escape_string($db, $_POST["fullname"]);
          $email = mysqli_real_escape_string($db, $_POST["email"]);
          $phone = mysqli_real_escape_string($db, $_POST["phone"]);
          $duedate = mysqli_real_escape_string($db, $_POST["duedate"]);
          $city = mysqli_real_escape_string($db, $_POST["city"]);
          $amount_paid = mysqli_real_escape_string($db, $_POST["amount_paid"]);
          $status = mysqli_real_escape_string($db, $_POST["status"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]);   
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]); 

            if (empty($spare_name)&&empty($spare_desc)&&empty($spare_price)) {
              header('location:customer.php?notification');
              // code...
            }
     
          else {
      
           $query = "INSERT INTO customer (fullname,phone,duedate,city,status,spare_name,spare_desc, spare_price,email,amount_paid) VALUES('$fullname','$phone','$duedate','$city','$status','$spare_name','$spare_desc','$spare_price','$email','$amount_paid')";  
          if(mysqli_query($db, $query))  
          {  
               header("location:customer.php?success"); 
          }
          else
            
               header("location:customer.php?error"); 

  
         }
       }

      
    

   

    // Get all the submitted data from the form

?>
<script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>