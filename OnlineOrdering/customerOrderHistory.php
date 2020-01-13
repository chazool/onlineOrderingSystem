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
                    <th>Discount</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>1001</td>                     
                    <td>2019-07-25 10.20</td>
                    <td>Delivery</td>
                    <td>1000.00</td>
                    <td>00.00</td>
                    <td>1000.00</td>
                    <td>Pending</td>
                </tr>
                 <tr>
                    <td></td>
                    <td>1002</td>
                    <td>2019-07-25 10.20</td>
                      <td>Delivery</td>
                    <td>1000.00</td>
                    <td>00.00</td>
                    <td>1000.00</td>
                     <td>Done</td>
                </tr>
            </tbody>
        </table>
    </div>
</div></section>
    </main>
   
       
     <?php include("assets/common/mainFooter.php"); ?>	
    <script src="assets/js/customerOrderHistory.js"></script>    
</body>
</html>