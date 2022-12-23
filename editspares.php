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

<div class="sales-boxes">
      <div class="recent-sales box">
        <div class="title">Recent Purchases</div>
        <div class="sales-details">
          <?php include 'connect.php';
          $spare=mysqli_query($db,"SELECT * FROM spare ORDER BY siku DESC");
          $count=mysqli_num_rows($spare);
          if ($count==0): ?>
            <f>there is no purchases</f>
          <?php endif ?>

          <?php if ($count > 0): ?>
            <table class="styled-table mt-5">
              <thead>
                <tr>
                  <th> <font face="Arial">Date</font> </th> 
                  <th> <font face="Arial">Spare Name</font> </th> 
                  <th> <font face="Arial">Spare Description</font> </th> 
                  <th> <font face="Arial">Spare Price</font> </th>
                  <th> <font face="Arial">items</th>

                  <th> <font face="Arial">Brand</font> </th> 
                  <th> <font face="Arial">Status</font> </th>
                  <th> <font face="Arial">Payment Method</font> </th>
                  <th colspan="3" style="text-align: center;" > <font face="Arial">action</font> </th>
                </tr>
              </thead>
              <tbody>
                <?php while($res = mysqli_fetch_array($spare)) { ?> 
                  <tr>
                    <td><?php echo $res['siku']?></td>
                    <td><?php echo $res['spare_name']?> </td>
                    <td><?php echo $res['spare_desc']?> </td>
                    <td><?php echo $res['spare_price'] ?> </td>
                     <td><?php echo $res['items'] ?> </td>


                    <td><?php echo $res['brand'] ?> </td>
                    <td><?php echo $res['status'] ?> </td>
                    <td><?php echo $res['payment'] ?> </td>

                    <td><?php echo "<a href=\"editpurch.php?spare_id=$res[spare_id]\"><button class='editcl'>Edit</button></a>";?> </td>
                    <td><?php echo "<a href=\"addspare.php?spare_id=$res[spare_id]\"><button class='editcl'>Add</button></a>";?> </td>

                    <td><?php echo "<a href=\"deletepurch.php?spare_id=$res[spare_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button class='deletcl'>Delete</button></a>"?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php endif ?>

        </div>          
      </div>
    </div>
  </div>
    </div>
</section>


</body>
</html>

