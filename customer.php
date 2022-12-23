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
    <div class="customer">
      <div class="title">
        <h2>Fill Customer Details</h2>
        <?php 
        if (isset($_GET['success'])) {
    // code...

          ?>
          <p style="color:blue;text-align: center;">customer added</p>

          <?php 
        }
        ?>
        <?php
        if (isset($_GET['error'])) {
    // code...

          ?>
          <p style="color:red; text-align: center;" >customer couldnt added</p>

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
      </div>
      <div class="row">
        <div class="col-75">
          <div class="container">
            <form action="cust_action.php" method="POST">

              <div class="row">
                <div class="col-50">

                  <h3>Sales onCredit Details</h3>


                  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                  <input type="text" id="fname" name="fullname" placeholder="Ramadhani Shaibu Rajabu">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="nzania@example.com">
                  <label for="phone"><i class="fa fa-phones"></i>Phone Number</label>
                  <input type="text" id="phone" name="phone" placeholder="0776623198">
                  <label for="city"><i class="fa fa-institution"></i> Region</label>
                  <input type="text" id="city" name="city" placeholder="MWANZA">
                  <label for="city"><i class="fa fa-institution"></i> Spare Name</label>
                  <input type="text" id="city" name="spare_name" placeholder="Spare Name">
                  <label for="city"><i class="fa fa-institution"></i> Spare Description</label>
                  <input type="text" name="spare_desc" placeholder="Description">
                  <label for="city"><i class="fa fa-institution"></i> Spare Price</label>
                  <input type="text" name="spare_price" placeholder="30000">
                  <label for="city"><i class="fa fa-institution"></i>Amount Paid</label>
                  <input type="text" name="amount_paid" placeholder="3000">
                  <label for="expyear">Status</label>
                  <select name="status" id="status">
                    <option value="Not Paid">Not Paid</option>
                    <option value="Paid">Paid</option>
                  </select>

                  <div class="row">
                    <div class="col-50">
                      <label for="state">Duedate</label>
                      <input type="date" name="duedate">
                    </div>

                  </div>
                </div>

              </div>
              <input type="submit" value="Sell onCredit" name="upload" class="btn">
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="sales-boxes">
      <div class="recent-sales box">
        <div class="title">Recent Sales onCredit</div>
        <div class="sales-details">
          <?php include 'connect.php';
          $spare=mysqli_query($db,"SELECT * FROM customer ORDER BY duedate ASC");
          $count=mysqli_num_rows($spare);
          if ($count==0): ?>
            <f>there is no purchases</f>
          <?php endif ?>

          <?php if ($count > 0): ?>
            <center>
            <table class="styled-table mt-5">
              <thead>
                <tr>
                  <th> <font face="Arial">Duedate</font> </th> 
                  <th> <font face="Arial">CustomerName</font> </th>
                  <th> <font face="Arial">Email</font> </th>
                  <th> <font face="Arial">Phone No</font> </th>
                  <th> <font face="Arial">Spare Name</font> </th> 
                  <th> <font face="Arial">Spare Description</font> </th> 
                  <th> <font face="Arial">Spare Price</font> </th>
                  <th> <font face="Arial">Amount Paid</font> </th>
                  <th> <font face="Arial">City</font> </th> 
                  <th> <font face="Arial">Status</font> </th>
                  <th colspan="2" style="text-align: center;" > <font face="Arial">action</font> </th>
                </tr>
              </thead>
              <tbody>
                <?php while($res = mysqli_fetch_array($spare)) { ?> 
                  <tr>
                    <td><?php echo $res['duedate']?></td>
                    <td><?php echo $res['fullname']?> </td>
                    <td><?php echo $res['email']?> </td>
                    <td><?php echo $res['phone']?> </td>
                    <td><?php echo $res['spare_name']?> </td>
                    <td><?php echo $res['spare_desc']?> </td>
                    <td><?php echo $res['spare_price'] ?> </td>
                    <td><?php echo $res['amount_paid'] ?> </td>
                    <td><?php echo $res['city'] ?> </td>
                    <td><?php echo $res['status'] ?> </td>

                    <td><?php echo "<a href=\"editcust.php?customer_id=$res[customer_id]\"><button class='editcl'>Edit</button></a>";?> </td>

                    <td><?php echo "<a href=\"deletecust.php?customer_id=$res[customer_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button class='deletcl'>Delete</button></a>"?></td>;
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php endif ?>
          </center>

        </div>
      </div>
    </div>
  </div>

      </section>

      <script>
       let sidebar = document.querySelector(".sidebar");
       let sidebarBtn = document.querySelector(".sidebarBtn");
       sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
          sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    </script>

  </body>
  </html>


