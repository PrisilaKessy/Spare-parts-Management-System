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

<br>
  <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Order</div>
          <div class="sales-details">
            <?php include 'connect.php';
            $spare=mysqli_query($db,"SELECT * FROM customer_order ORDER BY siku DESC");
            $count=mysqli_num_rows($spare);
            if ($count==0): ?>
              <f>there is no purchases</f>
            <?php endif ?>

            <?php if ($count > 0): ?>
              <table class="styled-table mt-5">
                <thead>
                  <tr>
                    <th> <font face="Arial">Date</font> </th> 
                    <th> <font face="Arial">Customer Name</font> </th> 
                    <th> <font face="Arial">Email</font> </th> 
                    <th> <font face="Arial">Phone No</font> </th>
                    <th> <font face="Arial">Spare Name</font> </th>
                    <th> <font face="Arial">Spare Description</font> </th>
                    <th> <font face="Arial">Spare Price</font> </th>
                    <th> <font face="Arial">Status</font> </th> 
                    <th colspan="2" style="text-align: center;" ><font face="Arial">Action</font> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($res = mysqli_fetch_array($spare)) { ?> 
                    <tr>
                      <td><?php echo $res['siku']?></td>
                      <td><?php echo $res['fullname']?> </td>
                      <td><?php echo $res['email']?> </td>
                      <td><?php echo $res['phone'] ?> </td>
                      <td><?php echo $res['spare_name'] ?> </td>
                      <td><?php echo $res['spare_desc'] ?> </td>
                      <td><?php echo $res['spare_price'] ?> </td>
                      <td><?php echo $res['status'] ?> </td>

                      <td><?php echo "<a href=\"editorder.php?order_id=$res[order_id]\"><button class='editcl'>Edit</button></a>";?> </td>

                      <td><?php echo "<a href=\"deleteorder.php?order_id=$res[order_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button class='deletcl'>Delete</button></a>"?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php endif ?>
          </div>
        
        </div>


      </div>
    </section>
</div>


  </body>
  </html>

