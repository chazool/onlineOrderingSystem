
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
             <p>© 2019 ABC Cafeteria</p>
        </div>
    </footer>
		
	
   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>   
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	 
	
	
	<script >
    $( window ).on( "load", function() {
		var custid=$("#custId").val();
		var role=$("#userRole").val();
		//alert(role);
	
		if(custid === '-1' ){
			$("#loggedUserNavDiv").hide();
		}else{
			$("#loggedUserNavDiv").show();
			//alert(custid);
		}
        //
			//$("#shopingCartRegCusNavDiv").hide();	
			//$("#registrationNavDiv").hide();
			//$("#foodManageNavDiv").hide();	
			//$("#kitchenNavDiv").hide();
			//$("#riderHistoryNavDiv").hide();
			//$("#riderOrderNavDiv").hide();
			//$("#loginNavDiv").hide();
			//$("#maintainAvailabilFoodNavDiv").hide();			
		//
		if( $.trim(role.toLowerCase()) === "customer"){	
			$("#shopingCartRegCusNavDiv").show();	
				
		}
		else if( $.trim(role.toLowerCase()) === "rider"){	
			$("#shopingCartRegCusNavDiv").show();
			$("#riderOrderNavDiv").show();
		
		}
		else if( $.trim(role.toLowerCase()) === "chef"){	
			$("#shopingCartRegCusNavDiv").show();
			$("#kitchenNavDiv").show();
			
			//			
		}
		else if( $.trim(role.toLowerCase()) === "admin"){				
			$("#shopingCartRegCusNavDiv").show();
			$("#registrationNavDiv").show();
			$("#foodManageNavDiv").show();
			//foodManageNavDiv
				
					
			//			
		}
		else{
			
			$("#loggedUserNavDiv").hide();	
			$("#loginNavDiv").show();	
			$("#shopingCartRegCusNavDiv").show();
			//deliveryDetailsDiv
			
		}
		
    });
	
	$('#logout').click(function() {
	
		$.ajax({
		url: 'logout.php',
		type: 'POST',
		data: {"type":"all"},
		success:function(response){
			window.location.replace("index.php");
		}
		});
		
	});
	</script>
	
	