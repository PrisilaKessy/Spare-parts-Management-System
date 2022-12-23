
<?php
error_reporting(1);
include 'connect.php';
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {


if (empty($_POST['firstname'])&&empty($_POST['middlename'])&&empty($_POST['lastname'])&&empty($_POST['email'])&&empty($_POST['phone'])&&empty($_POST['age'])&&empty($_POST['city'])&&empty($_POST['gender'])&&empty($_POST['position'])&&empty($_POST['filename'])&&empty($_POST['ourmoto'])) {
     
                echo '<div class="error" > You must fill all spaces to register
                                      </div>' ; 
      } 


      else{
    
          $firstname = mysqli_real_escape_string($db, $_POST["firstname"]);
          $lastname = mysqli_real_escape_string($db, $_POST["lastname"]); 
          $middlename = mysqli_real_escape_string($db, $_POST["middlename"]);   
          $position = mysqli_real_escape_string($db, $_POST["position"]); 
          $age = mysqli_real_escape_string($db, $_POST["age"]); 
          $phone = mysqli_real_escape_string($db, $_POST["phone"]);  
          $email = mysqli_real_escape_string($db, $_POST["email"]); 
          $gender = mysqli_real_escape_string($db, $_POST["gender"]);  
          $city = mysqli_real_escape_string($db, $_POST["city"]);
          $ourmoto = mysqli_real_escape_string($db, $_POST["ourmoto"]);
          $start = mysqli_real_escape_string($db, $_POST["start"]);
          $archived = mysqli_real_escape_string($db, $_POST["archived"]); 
          $party = mysqli_real_escape_string($db, $_POST["party"]); 
         $check=mysqli_num_rows(mysqli_query($db,"SELECT * FROM candidate WHERE phone='$phone' || email='$email' "));
         if ($check==1) {
           echo '<div class="error" >candidate already exist!!
                                      </div>' ; 
           // code...
         }
         $angalia=mysqli_num_rows(mysqli_query($db,"SELECT * FROM `candidate` WHERE party='$party' && position='$position'"));
         if ($angalia==1) {
          echo '<div class="error" >one party must have only one candidate this position already taken!!
                                      </div>' ; 
           // code...
           // code...
         }
         else {
           $query = "INSERT INTO candidate (firstname,middlename,lastname, position,phone,email,age,filename,gender,city,ourmoto,start,archived,party) VALUES('$firstname','$middlename','$lastname', '$position','$phone','$email','$age','$filename','$gender','$city','$ourmoto','$start','$archived','$party')";  
          if(mysqli_query($db, $query))  
          {  
                echo '<div class="success" >
                                     Registration Success
                                      </div>' ;  
          }
          else
            
                echo '<div class="error" >
                                     Registration Failed
                                      </div>';
  
          if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
          }
          else{
            $msg = "Failed to upload image";
          }
         }

      }
    }

  
    // Get all the submitted data from the form

?>
<script>
   $(document).ready(function(){
   window.history.replaceState('','',window.location.href)
   });
</script>