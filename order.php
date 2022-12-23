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
    <div class="sales">
      <h1 style="text-align: center;">Order Details</h1>
      <div class="Fields">
        <div>
          <div class="formContainer">
            <?php
            if (isset($_GET['success'])) {
    // code...

              ?>
              <p style="color:blue;text-align: center;">spare ordered</p>

              <?php 
            }
            ?>
            <?php
            if (isset($_GET['error'])) {
    // code...

              ?>
              <p style="color:red; text-align: center;" >spare couldnt ordered</p>

              <?php 
            }
            ?>
            <?php
            if (isset($_GET['notification'])) {
    // code...

              ?>
              <p style="color:red; text-align: center;" >fill all fields to proceed</p>

              <?php 
            }
            ?>
            <form action="order_action.php" method="POST">
              <div class="Fields">
                <div>
                  <h3>Customer Details</h3>
                  <label for="fname">Full Name</label>
                  <input type="text" id="fname" name="fullname" />
                  <label for="email"> Email</label>
                  <input type="text" id="email" name="email" />
                  <label for="adr"> Phone Number</label>
                  <input type="text" id="phone" name="phone" />
                </div>
                <div>
                  <h3>Spare Details</h3>
                  <label for="spname">Spare Name</label>
                  <input type="text" id="spname" name="spare_name" />
                  <label for="desription">Spare Description</label>
                  <input type="text" id="desc" name="spare_desc" />
                  <label for="price"> Price</label>
                  <input type="text" id="price" name="spare_price" />
                </div>
                <div>
                  <div class="Fields">
                    <div>
                      <label for="expyear">Status</label>
                      <select name="status" id="status">
                        <option value="Complete">Complete</option>
                        <option value="Pending">Pending</option>
                        <option value="Canceled">Canceled</option>
                      </select></div>

                    </div>
                  </div>
                </div>
                <input type="submit" value="Add Order" name="upload" class="checkout"
                />
              </form>
            </div>
          </div>
        </div>

     <a href="vieworder.php">view order</a>

    </section>



  </body>
  </html>

