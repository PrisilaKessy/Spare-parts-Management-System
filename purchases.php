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
      <h1 style="text-align: center;">Purchases Details</h1>
      <div class="Fields">
        <div>
          <div class="formContainer">
            <?php
            if (isset($_GET['success'])) {
    // code...

              ?>
              <p style="color:blue;text-align: center;">spare added</p>

              <?php 
            }
            ?>
            <?php
            if (isset($_GET['error'])) {
    // code...

              ?>
              <p style="color:red; text-align: center;" >spare couldnt added</p>

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
            <form action="purchase_action.php" method="POST">
              <div class="Fields">
                <div>
                  <h3>Spare Details</h3>
                  <label for="spname">Spare Name</label>
                  <input type="text" id="spname" name="spare_name" />
                  <label for="desription">Spare Description</label>
                  <input type="text" id="desc" name="spare_desc" />
                  <label for="price"> Price</label>
                  <input type="text" id="price" name="spare_price" />
                  <label for="price"> Brand</label>
                  <input type="text" id="price" name="brand" />
                                    <label for="price"> Items</label>

                                    <input type="number" id="price" name="items" />

                </div>
                <div>
                  <h3>Payment method</h3>
                  <label for="expyear">Payment Method</label>
                  <select name="payment" id="payment">
                    <option value="M-pesa">M-pesa</option>
                    <option value="Tigo-pesa">Tigo-pesa</option>
                    <option value="Halopesa">Halopesa</option>
                    <option value="Aitel-money">Aitel-money</option>
                  </select>
                  <div class="Fields">
                    <div>
                      <label for="expyear">Status</label>
                      <select name="status" id="status">
                        <option value="Paid">Paid</option>
                        <option value="Broked">Brocked/damage</option>
                        <option value="Returned ">Returned</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <input type="submit" value="Purchases" name="upload" class="checkout"
              />
            </form>
          </div>
        </div>
      </div>
<a href="editspares.php">edit spares</a>

    </div>
    
</section>


</body>
</html>

