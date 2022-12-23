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
  <?php include 'nav.php';?>
    <div class="home-content">
      <?php include 'dash.php';?>
    <div class="sales">
      <h1 style="text-align: center;">Generete Report</h1>
      <div class="Fields">
        <div>
          <div class="formContainer">
            <form action="purchase_action.php">
              <div class="Fields">
                <div>
                  <h3>Sales Report</h3>
                  <label for="from">From</label>
                  <input type="date" id="from" name="mauzo_date" />
                  <label for="to">To</label>
                  <input type="date" id="to" name="To_tarehe" />
                </div>
                <div>
                  <h3>Purchases Report</h3>
                  <label for="from">From</label>
                  <input type="date" id="from" name="manunuz_date" />
                  <label for="to">To</label>
                  <input type="date" id="to" name="To_tarehe" />
                  </div>
                </div>
                <input type="submit" value="Generete" name="submit" class="checkout"
                />
              </form>
            </div>
          </div>
        </div>


      </div>

      <div class="sales-boxes">



      </div>
    </div>
  </section>

  
</body>
</html>

