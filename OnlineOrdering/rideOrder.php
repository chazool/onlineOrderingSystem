<?php include("assets/common/mainHeader.php"); ?>
    <main class="page payment-page">
        <section class="clean-block payment-form dark"><div class="container">
    <div class="block-heading">
        <h2 class="text-info">Rider Order</h2>        
    </div>
	
    <form>       
        <div class="card-details">
            <h3 class="title">Customer Details</h3>
            <div class="form-row">
                <div class="col-sm-12">
                    <label for="card-holder">Customer Name :</label> 
                        <label class="font-weight-bold text-info" id="cusName"></label>
                    
                </div>
                  <div class="col-sm-12">
                    <label for="card-holder">Telephone :</label> 
                        <label class="font-weight-bold text-info" id="cuPhone"></label>
                    
                </div>
                   <div class="col-sm-12">
                   <label for="card-holder">Address :</label> 
                        <label class="font-weight-bold text-info" id="address" ></label>
                        
                </div>
                  <div class="col-sm-6">
                   
                        <button class="btn btn-success btn-block" type="button" id="map">Map</button>
                     
                </div>
               
               
                <div class="col-sm-6">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" id='end' type="button">End</button>
                    </div>
                </div>
            </div>
            
            
            
        </div>
         <div class="products">
            <h3 class="title" id='billReference'></h3>
			 <input type="hidden" id="orderId_hidden" >
			<div id="orderItem">
			
			
			</div>
			
            <div class="total"><span>Total</span><span class="price" id='total'></span></div>
        </div>
    </form>
</div></section>
    </main>
</div></section>
    </main>	
   <?php include("assets/common/mainFooter.php"); ?>	
    <script >
	   
	$( "#map" ).click(function() {
		//alert("Click")
		 var from="ESOFT Metro Campus Matara, Matara";
		 var to= $("#address").text();
		
		 var  link="https://www.google.com/maps?saddr="+from+"&daddr="+to
		  window.open(link);
	});
	
	
	$( "#end" ).click(function() {
		
		
		var today = new Date();
		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var dateTime = date+' '+time;
		//order_id , dateAndTime ,  columnName
		var search={
		"order_id":$( "#orderId_hidden" ).val() ,
		"dateAndTime":dateTime,
		"columnName": 'take_or_Deleverd_Time',
		"orderStatus": 'delivered',
		"riderId": $("#custId").val()
		
		}
				$.ajax({
				url: 'assets/php/UpdateOrder.php',
				type: 'POST',
				data: search,
				success:function(response){
						//$.notify("Delivery"+" - "+order_id , "success");
						console.log(response);
						swal("Good job!", "Thank You!", "success");
						   location.reload();
				}
			});
		
		
		
		
		
		
	});
	
	
	
	loadRiderOrder();
	function loadRiderOrder(){
		alert("loadRiderOrder");
		var dataMap={"riderid": $("#custId").val() };
		
			$.ajax({
				url: 'assets/php/selectRiderOrder.php',
				type: 'POST',
				data: dataMap,
				success:function(response){
				
				
				
				var order = JSON.parse(response)[0];
				console.log(order['customer_fname']);
				$( "#cusName" ).text(order['customer_fname']+" "+order['customer_lname']);
				$( "#cuPhone" ).text(order['telephone']);
				$( "#address" ).text(order['address']);
				$( "#orderId_hidden" ).val(order['order_id']);
				$( "#billReference" ).text("Bill - "+order['order_id']);
				$( "#total" ).text(order['netAmount']); //
				getOrderItem(order['order_id']);
				}
			});	
		
		
		
	}
	
	
	
	 function getOrderItem(order_id){
		 	$.ajax({
				url: 'assets/php/selectOrderIterms.php',
				type: 'POST',
				data: {"order_id": order_id },
				success:function(response){
								
					
			
				$.each(JSON.parse(response), function( key, value ) {
					
					var item='<div class="item"><span class="price">'+ value.price +' </span>    <p class="item-name">'+ value.itemName +'</p> </div>';
				
					$( "#orderItem" ).append( item);
				
				
						});
			
				}
				});	 	
		}
	
	
	
	
	
	
	
	
	
	
	
	</script>
   
   
   
   
</body>

</html>