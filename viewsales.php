<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php include 'nav.php';?>

    <div class="home-content">


      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <?php include 'connect.php';
            $spare=mysqli_query($db,"SELECT * FROM sales ORDER BY siku DESC");
            $count=mysqli_num_rows($spare);
            if ($count==0): ?>
                <f>there is no sales</f>
            <?php endif ?>

            <?php if ($count > 0): ?>
                <table class="styled-table mt-5">
                    <thead>
                        <tr>
                            <th> <font face="Arial">Date</font> </th> 
                            <th> <font face="Arial">Spare Name</font> </th> 
                            <th> <font face="Arial">Spare Description</font> </th> 
                            <th> <font face="Arial">Spare Price</font> </th> 
                            <th> <font face="Arial">Status</font> </th>
                            <th colspan="2" style="text-align: center;" > <font face="Arial">action</font> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($res = mysqli_fetch_array($spare)) { ?> 
                            <tr>
                                <td><?php echo $res['siku']?></td>
                                <td><?php echo $res['spare_name'];?> </td>
                                <td><?php echo $res['spare_desc'];?> </td>
                                <td><?php echo $res['spare_price'] ;?> </td>
                                <td><?php echo $res['status'] ;?> </td>
                              
                                    <td><?php echo "<a href=\"editsales.php?sales_id=$res[sales_id]\"><button class='editcl'>Edit</button></a>";?> </td>

                                    <td><?php echo "<a href=\"deletesales.php?sales_id=$res[sales_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button class='deletcl'>Delete</button></a>"?></td>; 
                             
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif ?>
            
        </div>
    </div>

</div>
</div>
</section>

</body>
</html>