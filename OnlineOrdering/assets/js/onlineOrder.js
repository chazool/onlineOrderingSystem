






   var clients = [
       // { "Name": "Otto Clay", "Age": 25, "Qty": 1, "Price": "Ap #897-1459 Quam Avenue", "Married": false }

    ];
var tableData=[];
//-----------------------------------------Item  Js Grid-------------------------------------
$("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",

        inserting: false,
        editing: false,
        sorting: true,
        paging: true,

        onRefreshed: function (args) {
            var items = args.grid.option("data");
            //alert("onRefreshed");
        var subtotal=0.00;
        $.each( items, function( key, value ) {

              subtotal=value.Price+subtotal;

        });

	//console.log("JS Grid----------");
   $("#subTotal").text("$"+(subtotal).toFixed(2));
   

	 var subTotal=parseFloat($("#subTotal").text().replace('$',''));
	//console.log("subTotal : "+subTotal);
	//discount is change >> Service charge
    var discoount=parseFloat($("#discoount").text().replace('$',''));
	discoount = (subTotal / 100) * 4;
	//console.log("discoount : "+discoount);
	
    var Delivery=parseFloat($("#Delivery").text().replace('$',''));
	//console.log("Delivery : "+Delivery);
	
    var total=subTotal+discoount+Delivery;
	//console.log("total : "+total);
	
	var tax= (total/100)*8;
	//console.log("tax : "+tax);
	


	//Service Charge
	$("#discoount").text("$"+(discoount).toFixed(2));
	//Tax Amount
	$("#tax").text("$"+(tax).toFixed(2));
	//Net Amount
    $("#billTotal").text("$"+(total+tax+discoount).toFixed(2));
		
	//$("#discoount").text("$"+(total+tax).toFixed(2));
	


        },
        
        controller: {

          

        },

        fields: [
            { name: "Name", type: "text", width: 150, validate: "required" },
            { name: "Qty", type: "number", width: 50 },
            { name: "Price", type: "number", width: 100 },
			{ name: "ItemId", type: "text", css: "hideJsGridCol", width: 0},
            { type: "control",editButton: false }
        ]
    });

//----------------------------------------- Add Item-------------------------------------

//$('.itmeAdd').click(function() {
  $('#itemsDiv').on('click', '.itmeAdd', function() {
    //alert("Item Add Click");

        var buttonValue=$(this).attr('value');
        var qty=$("#"+buttonValue+"_qty").val();
        var item=$("#"+buttonValue+"_itemName").text();
        var price=$("#"+buttonValue+"_itemPrice").text();
        if(qty<=0){
          swal ( "Oops" ,  "Something went wrong!" ,  "error" );
        }
        else{

          $("#jsGrid").jsGrid("insertItem", { Name:item , Qty: qty, Price: price*qty ,ItemId:buttonValue});
         // getSummary();
        }
});

//----------------------------------------- Summary  function-------------------------------------

function getSummary(){
   // alert("getSummary");
  var items = $("#jsGrid").jsGrid("option", "data");

  var subtotal=0.00;
  $.each( items, function( key, value ) {

        subtotal=value.Price+subtotal;

  });

	console.log("getSummary----------");
  var subTotal=parseFloat($("#subTotal").text().replace('$',''));
	console.log("subTotal : "+subTotal);
	//discount is change >> Service charge
    var discoount=parseFloat($("#discoount").text().replace('$',''));
	discoount = (subTotal / 100) * 4;
	console.log("discoount : "+discoount);
	
    var Delivery=parseFloat($("#Delivery").text().replace('$',''));
	console.log("Delivery : "+Delivery);
	
    var total=subTotal+discoount+Delivery;
	console.log("total : "+total);
	
	var tax= (total/100)*8;
	console.log("tax : "+tax);


	$("#subTotal").text("$"+(subtotal).toFixed(2));
	$("#discoount").text("$"+(discoount).toFixed(2));
	$("#tax").text("$"+(discoount).toFixed(2));
    $("#billTotal").text("$"+(total).toFixed(2));
}

//-----------------------------------------Check Out -------------------------------------
$('#checkout').click(function() {
	//addOrderItem(6);
	var subTotal=parseFloat($("#subTotal").text().replace('$',''));

    var discoount=parseFloat($("#discoount").text().replace('$',''));

    var Delivery=parseFloat($("#Delivery").text().replace('$',''));
	
	var total=parseFloat($("#billTotal").text().replace('$',''));
	//
	var currentDate=formatDate(new Date());
	var time=$('#time').val();
	
	
	var items = $("#jsGrid").jsGrid("option", "data");
	//
	//checkpoint
	if(time===null || time===""){
		swal("Please Check!", "Set Your Time!", "error");
	}else if(items.length<1){		
		swal("Please Check!", "Add Your Food!", "error"); 	
	}
	else{
		
		if($("#custId").val() === "-1"){
			
			if($("#nonRegCusName").val().trim().length <= 1){
				swal("Please Check!", "Add Your Name!", "error"); 
			}
			else if($("#nonRegCusPhone").val().trim().length < 10){
				swal("Please Check!", "Add Your Phone!", "error"); 
			}
			else{
				conformAlert();		
			}
		}
		else{
		conformAlert();			
		}
	}
	
});

function conformAlert(){
			swal({
				  title: "Are you sure?",
				  text: "Confirm your order!",
				  icon: "info",
				  buttons: true,
				  dangerMode: true,
				})
				.then((yes) => {
					
				  if (yes) {
					$('#checkoutCnfDiv').hide();
					$('#paypalButton').show();
					
				  }
				});	
}

function addOrder(dataMap,PaymentData){
	
	var today = new Date();
	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
	var dateTime = date+' '+time;
	var obtainOption = $("input[name='obtain']:checked").val();
	
	
	//Delevery Note 
	var note="";
	
	if($("#custId").val() === "-1"){
		note="Name:" + $("#nonRegCusName").val() +", Phone:" + $("#nonRegCusPhone").val() + ", Email:" + $("#nonRegCusEmail").val() ;
	}
	else{
		
		note = $("#deleveryNote").val() ;
	}
		
	
	var dataArray={
		'cus_id' : $("#custId").val() ,
        'datetime' : dateTime ,
        'Delivery': dataMap.Delivery ,
        'tax' : dataMap.tax ,
		'servicecharge' : dataMap.servicecharge ,
		'netAmount' :  dataMap.netAmount,
		'grossAmount' : dataMap.grossAmount,
		'note' : note,
		'obtainOption' : obtainOption , 
		'need_time' :  $("#time").val()		
	};
	
			var orderMap={
				"order":dataArray,
				"orderItem":[]
			};
	
		//console.log(dataArray)
			$.ajax({
				url: 'assets/php/OnlineOrderAdd.php',
				type: 'POST',
				data: dataArray,
				success:function(response){
				//alert(response);
				//console.log(response);
				
				addOrderItem(JSON.parse(response),PaymentData);
				
				}
			});	
	
	
}



function addOrderItem(orderId,PaymentData){
		//
	var items = $("#jsGrid").jsGrid("option", "data");
		//console.log(items);
	$.each( items, function( key, value ) {
					
		var dataMap={"ItemId": value.ItemId, "Qty": value.Qty,"Price": value.Price,"order_id":orderId };
		
			$.ajax({
				url: 'assets/php/OnlineOrderItemAdd.php',
				type: 'POST',
				data: dataMap,
				success:function(response){
				
				}
			});			
	});

	swal("Bill No :"+orderId ,'Thank You!! \n Payment completed by ' + PaymentData.payer.name.given_name + '!', "success")
		.then((value) => {
			//sendEmail-------------------------------------------
				sendEmail(
					$( "#userEmail" ).val(),
					"Pending",
					orderId,
					);
		  location.reload();
		});
	
	
	
	
	
	
}

function SaveOrderItem(itemMap){
			$.ajax({
				url: 'assets/php/OnlineOrderItemAdd.php',
				type: 'POST',
				data: itemMap,
				success:function(response){
				
				}
			});
	
}


//-----------------------------------------Clear -------------------------------------
function clear(){



  $("#jsGrid").jsGrid("option", "data", []);
   $("#subTotal").text("$"+(0).toFixed(2));
   $("#discoount").text("$"+(0).toFixed(2));
   $("#Delivery").text("$"+(0).toFixed(2));
   $("#billTotal").text("$"+(0).toFixed(2));

}


//-----------------------------------------Obtain Change -------------------------------------
$( ".Obtain" ).change(function() {

  var option=$( this ).val();
  //
  $("#menuSelectDiv").show();
  $("#menuItemDiv").show();
 
  
  //
 if(option==='delivery'){

 }else if(option==='takeAway'){
	$("#Delivery").text("$"+(0).toFixed(2));
 }else{
  $("#menuSelectDiv").hide();
 }



});

//-----------------------------------------Food Menu Change-------------------------------------

$( "#menu" ).change(function() {
  loadFoodItem(); 
});

$( "#dish" ).change(function() {
  loadFoodItem(); 
});

function loadFoodItem(){

     var menu=$("#menu").val();
	 var dishes=$("#dish").val();
     
			$.ajax({
				url: 'assets/php/FoodItemSelect.php',
				type: 'POST',
				data: {"menu":menu,"dishes":dishes},
				success:function(response){
					//alert(response);
					//console.log(JSON.parse(response));
					jQuery('#itemsDiv div').html('');
					$.each( JSON.parse(response), function( key, value ) {
					  
						var itemId= value.id;
						 var itemName=value.fooditem_name;
						 var itemPrice= value.price;
						 var itemMenu= value.menutype;
						 var itemDis= value.dishes;
						 var imageurl="assets/img/food/"+value.image;

						 //==============
						 var item='<div class="row justify-content-center align-items-center">'+
												'<div class="col-md-3">'+
													'<div class="product-image">'+
													   ' <img class="img-fluid d-block mx-auto image" src="'+imageurl+'" />'+
												   ' </div>'+
												'</div>'+
												'<div class="col-md-5 product-info"><a class="product-name" id="'+itemId+'_itemName" href="#">'+itemName+'</a>'+
													'<div class="product-specs">'+
														'<div> <span class="value price" >$</span>   <span class="value price" id="'+itemId+'_itemPrice" >'+itemPrice+'</span></div>'+
														'<div><span class="value">'+itemMenu+'</span><span class="value"> - '+itemDis+'</span></div></div>'+
												'</div>'+
												'<div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity" >Quantity</label><input id="'+itemId+'_qty" type="number"  class="form-control quantity-input" value="1" /></div>'+
												'<div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success itmeAdd" value="'+itemId+'"  >Add</button></div>'+
											'</div>';

											

					   $( "#itemsDiv" ).prepend( item );
					  
					  
					});
				
				
				
				
				}
			});		
	 
	 //=========

    


}


//-----------------------------------------Form Load -------------------------------------
formLoad();
function formLoad(){
  //menuItemDiv
  $("#menuSelectDiv").hide();
   $("#menuItemDiv").hide();
   $("#paypalButton").hide();
  
	//current Date
    $("#CurrentDate").text( formatDate(new Date()));
	//current time
	//load Food
	loadFoodItem();

	 
  
	
}


function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}


//-----------------------------------------Payment Paypal-------------------------------------

		/*
		paypal.Buttons({
					// Set up the transaction
					createOrder: function(data, actions) {
						return actions.order.create({
							purchase_units: [{
								amount: {
									value: parseFloat($("#billTotal").text().replace('$',''))
								}
							}]
						});
					},
					
					// Finalize the transaction
					onApprove: function(data, actions) {
						return actions.order.capture().then(function(details) {
							// Show a success message to the buyer
							console.log("ABC");
							alert('Transaction completed by Hello ' + details.payer.name.given_name + '!');
						});
					}
		}).render('#paypal-button-container');
	
	*/
	
		 // Render the PayPal button into #paypal-button-container
       	  paypal.Buttons({
				createOrder: function(data, actions) {
				  return actions.order.create({
					purchase_units: [{
					  amount: {
						value: parseFloat($("#billTotal").text().replace('$',''))
						
					  }
					}]
				  });
				},
				onApprove: function(data, actions) {
				  return actions.order.capture().then(function(details) {
					//alert(' Hi ' + details.payer.name.given_name);
					//Save Order-----------------------------
					var grossAmount=parseFloat($("#subTotal").text().replace('$',''));

					var servicecharge=parseFloat($("#discoount").text().replace('$',''));

					var Delivery=parseFloat($("#Delivery").text().replace('$',''));
					
					var tax=parseFloat($("#tax").text().replace('$',''));
					
					var netAmount=parseFloat($("#billTotal").text().replace('$',''));
					
					
					
					
					
					var dataMap={"grossAmount":grossAmount,"Delivery":Delivery,"netAmount":netAmount ,"tax":tax,"servicecharge":servicecharge};
					//Call Save			
					addOrder(dataMap,details);
					sendEmail(
					$( "#userEmail" ).val(),
					"Pending",
					
					);
					//-----------------------------------------
					
					
					// Call your server to save the transaction
					return fetch('/paypal-transaction-complete', {
					  method: 'post',
					  headers: {
						'content-type': 'application/json'
					  },
					  body: JSON.stringify({
						orderID: data.orderID
					  })
					});
				  });
				}
		}).render('#paypal-button-container');

//btndistances
	function hello(){
		alert("Chazool Kaweesha");
	}


	
	$( document ).ready(function() {
  

	
	
	});


	

		

function sendEmail(email,orderStatus,orderId){
		//alert("sendEmail");
		//userEmail  /  userPhone
		var emailMaP={
			'email':$( "#userEmail" ).val(),
			'status': orderStatus,
			'orderId' : orderId
		}
			$.ajax({
				url: 'sendEmail.php',
				type: 'POST',
				data:emailMaP,
				success:function(response){
						//$.notify("Delivery"+" - "+order_id , "success");
						console.log(response);
						
				}
			});
	}


























