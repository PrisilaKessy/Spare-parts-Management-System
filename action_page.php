
<?php
error_reporting(1);
include 'connect.php';
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {


if (empty('filename')&&empty('spare_name')&&empty('spare_desc')&&empty('spare_price')) {
     
                echo '<div class="error" > You must fill all spaces to add
                                      </div>' ; 
      } 


      else{
          $filename = $_FILES["uploadfile"]["name"];
          $tempname = $_FILES["uploadfile"]["tmp_name"];  
          $folder = "images/".$filename;
    
    
          $filename = mysqli_real_escape_string($db, $_POST["filename"]);
          $spare_desc = mysqli_real_escape_string($db, $_POST["spare_desc"]); 
          $spare_name = mysqli_real_escape_string($db, $_POST["spare_name"]);   
          $spare_price = mysqli_real_escape_string($db, $_POST["spare_price"]); 
          
      
           $query = "INSERT INTO spare (filename,spare_name,spare_desc, spare_price) VALUES('$filename','$spare_name','$spare_desc', '$spare_price')";  
          if(mysqli_query($db, $query))  
          {  
               header("location:sparelist.php?success"); 
          }
          else
            
               header("location:sparelist.php?error"); 

  
         }

      }
    

    else {
      echo '<div class="notification" >Make sure you fill all spaces to avoid errors</div>';
    }

    // Get all the submitted data from the form

?>
<script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>