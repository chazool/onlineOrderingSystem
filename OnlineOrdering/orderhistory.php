	<?php include("assets/common/mainHeader.php"); ?>
    <main class="page faq-page">
        <section class="clean-block clean-faq dark"><div class="container">
    <div class="block-heading">
        <h2 class="text-info">Order History</h2>
        
    </div>
    <div class="block-content">
        <table id="customerOrderHistory" class="display" style="width: 100%;">
            <thead>
                <tr>
                    <th></th>
                    <th>Order No</th>                    
                    <th>Date and Time</th>
                     <th>Obtain</th>
                    <th>Sub Total</th>
                    <th>Dilivery Charge</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
			<?php
				include_once ("dbConection.php");
				 
				$sql="SELECT * FROM online_order   ";
				$records=mysqli_query($conn, $sql);
			

				while ($orders=mysqli_fetch_assoc($records)){
				 
				echo"<tr>";
				echo"<td> </td>";
				 echo"<td>".$orders['order_id']."</td>";
				echo"<td>".$orders['order_date_and_time']."</td>";		 
				 echo"<td>".$orders['obtain_option']."</td>";
				echo"<td>".$orders['grossAmount']."</td>";
				echo"<td>".$orders['distance_charge']."</td>";
				 echo"<td>".$orders['netAmount']."</td>";
				 
				  echo"<td>".$orders['orderStatus']."</td>";

				}
			?>
            <tbody>
              
            </tbody>
        </table>
    </div>
</div></section>
    </main>
    
   
   
       
     <?php include("assets/common/mainFooter.php"); ?>	
    <script src="assets/js/customerOrderHistory.js"></script>    
</body>
</html>