<?php
session_start();
$_SESSION["username"]=$_SESSION["logedUserName"];	
$_SESSION["userId"]=$_SESSION["LogedUserId"];	
$_SESSION["userRole"]=$_SESSION["LogedUserRole"];	
$_SESSION["userEmail"] =$_SESSION["LogedUserEmail"];	
$_SESSION["userPhone"] =$_SESSION["LogedUserPhone"];	


//echo $_SESSION['username'];


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ABC Cafeteria</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/datatable.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
	
	<style>
.hideJsGridCol
{
   display:none;
}
</style>
</head>

<body>






	
	
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
		
        <div class="container"><a class="navbar-brand logo" href="#"><img src="assets/img/logo.jpg" alt="" height="80" ></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation" ><a class="nav-link" href="index.php">Home</a></li>   
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">About Us</a></li>
					<li class="nav-item" role="presentation" id="riderHistoryNavDiv"  style="display: none;"><a class="nav-link" href="#">Rdider history</a></li>
					<li class="nav-item" role="presentation" id="riderOrderNavDiv"  style="display: none;"><a class="nav-link" href="rideOrder.php">Rdider Order</a></li>
					<li class="nav-item" role="presentation" id="kitchenNavDiv"  style="display: none;"> <a class="nav-link" href="chefOrder.php">Kitchen</a></li>
				
                    <li class="nav-item" role="presentation"  id="shopingCartRegCusNavDiv"  style="display: none;"><a class="nav-link" href="shopping_cart.php">Shoping Cart</a></li>
					<li class="nav-item" role="presentation"  id="shopingCartNonRegCusNavDiv"  style="display: none;"><a class="nav-link" href="shopping_cart_nonReg.php">Shoping Cart</a></li>						
					<li class="nav-item" role="presentation" id="loginNavDiv"  style="display: none;"><a class="nav-link" href="login.php">login</a></li>	
					
					<li class="nav-item dropdown" id="foodManageNavDiv"  style="display: none;">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Food Manage
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="foodMenu.php">Food Menu </a>
						  <a class="dropdown-item" href="foodItem.php">Food Item</a>						  
						</div>
					</li>
					<li class="nav-item dropdown" id="registrationNavDiv"  style="display: none;">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Manage
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="customerRegistation.php">Customer Registration  </a>
						  <a class="dropdown-item" href="employeeRegistation.php">Employee Registration</a>	
							<a class="dropdown-item" href="maintainAvailabilFood.php">Maintaine Available</a>	
						</div>
					</li>
					
				</ul>
            </div>
			 <div class="pull-right" id="loggedUserNavDiv"  style="display: none;">
                <ul class="nav navbar-nav ml-auto">
				
				 <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Welcome,<?php echo ucwords($_SESSION["username"]); ?>
					  
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="#">Profile</a>
						<input type="hidden" id="custId" name="custId" value="<?php echo ucwords($_SESSION["userId"]); ?>">
						<input type="hidden" id="userRole" name="custRole" value="<?php echo ucwords($_SESSION["userRole"]); ?>">
						
						<input type="hidden" id="userEmail" name="userEmail" value="<?php echo ucwords($_SESSION["userEmail"]); ?>">
						<input type="hidden" id="userPhone" name="userPhone" value="<?php echo ucwords($_SESSION["userPhone"]); ?>">
						
					  <a class="dropdown-item" href="orderhistory.php">Order History</a>        
					  <a class="dropdown-item"  id="logout">Logout</a>          
					</div>
				</li>
			
                </ul>
             </div>
        </div>
    </nav>
	