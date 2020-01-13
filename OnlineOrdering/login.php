<?php include("assets/common/mainHeader.php"); ?>
    <main class="page login-page">	
          
        <section class="clean-block clean-form " >

            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log In</h2>
                </div>
                <form  method="Post">
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" name="email"></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control" type="password" id="password" name="password"></div>
                    <div class="form-group">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Remember me</label></div>
                    </div><input type="button" class="btn btn-primary btn-block"  id="login" value="Log In" />
					<br>
					<p class="message">Not registered? <a href="customerRegistation.php">Create an account</a></p>
					</form>
					
            </div>
        </section> 
    </main>
    	<?php include("assets/common/mainFooter.php"); ?>
        <script src="assets/js/login.js"></script>  
		<script>
		$( "#login" ).click(function() {
			
			
			var loginData={	"email": $("#email").val(),"password": $("#password").val()	};
		
			   $.ajax({
				url: 'assets/php/accessLogin.php',
				type: 'POST',
				data: loginData,
				success:function(response){
				//alert(response);
				//cusName cusPhone cusAddress
				//var cusData=JSON.parse(response)[0];
				//alert(response);
					if(response === 'null' ){
						swal("Error!", "Invalid Email or Password!", "error");
					}else{
										
					$.ajax({
					url: 'assets/php/userSession.php',
					type: 'POST',
					data: JSON.parse(response)[0],
					success:function(response){
					window.open("index.php");
					
					}});
					}
				
				
				
				
				
				}
				});
			
	});

		</script>	
    </body>
</html>