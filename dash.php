      <?php include'totalreport.php';?>
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number"><?php echo $total_orders; ?></div>           
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number"><?php echo $total_sales; ?>Tsh</div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Purchases</div>
            <div class="number"><?php echo $total_onCredit; ?>Tsh</div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number"><?php echo $total_profit; ?>Tsh</div>
          </div>
        </div>
      </div>