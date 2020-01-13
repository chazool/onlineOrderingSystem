<?php  
 //test_class.php  
 include 'customer.php';  
 $data = new Databases;  
 $success_message = '';  
 if(isset($_POST["submit"]))  
 {  
      $insert_data = array(  
           'customer_fname'     =>     mysqli_real_escape_string($data->con, $_POST['customer_fname']),  
           'customer_lname'     =>     mysqli_real_escape_string($data->con, $_POST['customer_lname']),  
		   'Gender'             =>     mysqli_real_escape_string($data->con, $_POST['Gender']),  
           'email'              =>     mysqli_real_escape_string($data->con, $_POST['email']),  
		   'NICNo'              =>     mysqli_real_escape_string($data->con, $_POST['NICNo']),  
            
		   'password'           =>     mysqli_real_escape_string($data->con, $_POST['password']),  
		   'addressl1'           =>     mysqli_real_escape_string($data->con, $_POST['addressl1']),  
		   'addressl2'           =>     mysqli_real_escape_string($data->con, $_POST['addressl2']),  
		   'addressl3'           =>     mysqli_real_escape_string($data->con, $_POST['addressl3']),  
		      
		   
      ); 
	   
      if($data->insert('customer', $insert_data))  
      {  
           $success_message = 'Data Inserted Successfully';  
      }  
	         
 } 
 
 ?>  



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - ABC Cafeteria</title>
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
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">ABC Cafeteria</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="features.html">Features</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pricing.html">Pricing</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about-us.html">About Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Customer Registration</h2>
                    <?php  
                     if(isset($success_message))  
                     {  
                          echo $success_message;  
                     }  
                     ?>  
                </div><form method="post">
                
    <div class="row">
         <div class="col"> 
            <div class="form-group">
                <label for="customer_fname">Frist Name</label>
                <input type="text" class="form-control item"  name="customer_fname" id="customer_fname" />
            </div>
        </div>
        <div class="col"> 
            <div class="form-group">
                <label for="customer_lname">Last Name</label>
                <input type="text" class="form-control item" name="customer_lname" id="customer_lname" />
            </div>
        </div>
    </div> 
    <div class="row">
         <div class="col"> 
          <div class="form-group">
        <label for="Gender">Gender</label><br>
       <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="Gender" value="Male">
          <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="Gender" value="Female">
          <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    </div>  
        </div>
        <div class="col"> 
             <div class="form-group">
        <label for="NICNo">NIC No</label>
        <input type="type" class="form-control item" id="NICNo" name="NICNo"/>
    </div>
        </div>
    </div> 
    <div class="row">
         <div class="col"> 
          <div class="form-group">
            <label for="email">Email</label> 
            <input type="email" class="form-control item" id="email" name="email" />
        </div>
        </div>
        
    <div class="row">
         <div class="col"> 
            <div class="form-group">
                 <label for="password">Password</label><br>
                 <input type="password" class="form-control item" id="password" name="password" />
             </div>  
        </div>
   
    
    <div class="col"> 
             <div class="form-group">
        <label for="addressl1">Address L1</label>
        <input type="text" class="form-control item" id="addressl1" name="addressl1" />
         </div>
        </div>
    </div>
   
     <div class="col"> 
             <div class="form-group">
        <label for="addressl2">Street</label>
        <input type="text" class="form-control item" id="addressl2" name="addressl2" />
         </div>
        </div>
    
    
    <div class="col"> 
             <div class="form-group">
        <label for="addressl3">City</label><br>
        <input type="text" class="form-control item" id="addressl3" name="addressl3" />
         </div>
        </div>
    </div>
   
    <button class="btn btn-primary btn-block" name="submit"  type="submit" value="submit">Sign Up</button>
</form></div>
        </section>
    </main><footer class="page-footer dark">
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
    <script src="assets/js/customerOrderHistory.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <script src="assets/js/onlineOrder.js"></script>
    
    
   
</body>

</html>

  
 