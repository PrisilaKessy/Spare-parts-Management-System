else{
      while ($row=mysqli_fetch_array($spare)) {
          echo '<div class="product-card">';
          echo '<div class="product-image">';
          echo "<img src='images/".$row['filename']."'>"; 
          echo " </div>";
          echo '<div class="product-info">';
          echo '<h1>'.$row['spare_name'].'</h1>'; 
          echo '<p class="price">'.'Tsh' . $row['spare_price'] .'</p>';
          echo '<p>'. $row['spare_desc'] .'</p>';
           echo "
            <a href=\"sales.php?spare_id=$row[spare_id]\" class='card'><button>sale</button></a>";
        

          echo"</div>";
         
        
        }
      }
        ?>