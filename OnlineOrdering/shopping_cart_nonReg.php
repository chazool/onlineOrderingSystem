<?php include("assets/common/mainHeader.php"); ?>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
<div class="container">
    <div class="block-heading">
        <h2 class="text-info">Shopping Cart</h2>
         <div class="form-group font-weight-bold bg-info  text-white ">
             <h4 class="text-white">- Obtain - </h4>
       <div class="form-check form-check-inline h4" id="deliveryRedioDiv">
          <input class="form-check-input Obtain" type="radio" name="obtain" id="delivery" value="delivery" style="width: 20px; height: 20px;" >
          <label class="form-check-label" for="inlineRadio1">Delivery</label>
    </div>
    <div class="form-check form-check-inline h4">
          <input class="form-check-input Obtain" type="radio" name="obtain" id="takeAway" value="takeAway" style="width: 20px; height: 20px;">
          <label class="form-check-label" for="inlineRadio2">Take Away</label>
    </div>
    </div>
    <div class="row" id="menuSelectDiv">
         <div class="col"> 
          <div class="form-group">
            <label for="contactNo">Menu</label>
            <div class="form-group container w-35">

                          <select class="form-control" id="menu">
                          <option value="-1">- All -</option>
                          <option value="sl">Sri Lankan</option>
                          <option value="ch">Chinese</option>
                        </select>
                     </div>
        </div>
        </div>
        <div class="col"> 
             <div class="form-group">
        <label for="email">Dishes</label>
         <div class="form-group container w-35">

                          <select class="form-control" id="dish">
                          <option>- All -</option>
                          <option>Main dishes </option>
                          <option>Side dishes </option>
                        </select>
                     </div>
         </div>
        </div>
		
		 <div class="col"> 
             <div class="form-group">
        <label for="email">  Time  - </label><label for="email" class="font-weight-bold"" id="CurrentDate">  2019-02-17 </label>
		<input type="time" id="time" class="form-control item container w-35" id="foodName" />
        
         </div>
        </div>
		
		
    </div>

	





    </div>
    <div class="content " id="menuItemDiv">
        <div class="row no-gutters">
            <div class="col-md-12  col-lg-7 " >

                <div class="items h-75  d-inline-block" style="overflow-y: scroll;"   >
                    <div class="product" id="itemsDiv">

                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" id="10_itemName" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div> <span class="value price" >Rs.</span>   <span class="value price" id="10_itemPrice" >800.00</span></div>
                                    <div><span class="value">Chinese</span><span class="value"> - Side Dish</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity" >Quantity</label><input id="10_qty" type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success itmeAdd" value="10" >Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span><span class="value">Side Dis</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success pricebutton"  value="11">Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success">Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success">Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success">Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success">Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success">Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success">Add</button></div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <div class="product-image">
                                    <img class="img-fluid d-block mx-auto image" src="assets/img/aaa.jpg" />
                                </div>
                            </div>
                            <div class="col-md-5 product-info"><a class="product-name" href="#">Chinese Cuisine</a>
                                <div class="product-specs">
                                    <div><span class="value price">Rs.800.00</span></div>
                                    <div><span class="value">Chinese</span></div></div>
                            </div>
                            <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1" /></div>
                            <div class="col-6 col-md-2 price"> <button type="button" class="btn btn-success">Add</button></div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="col-md-12 col-lg-5 h-75 d-inline-block">
                 <div id="jsGrid"></div>
                     <div class="summary  ">
                    <h3>Summary</h3>
                       <h4><span class="text">Subtotal</span> <p id="subTotal" class="price">Rs.00.00</p> </h4>
                    <h4><span class="text">Discount</span> <p id="discoount" class="price">Rs.00.00</p></h4>
                    <h4><span class="text">Delivery</span> <p id="Delivery" class="price">Rs.00.00</p></h4>
                    <h4><span class="text">Total</span><p id="billTotal" class="price font-weight-bold">Rs.00.00</p></h4>
					
					<!-- Set up a container element for the button -->
					<div id="paypalButton" style="display: none;">
					<div id="paypal-button-container"></div>
					</div>
					<div id="checkoutCnfDiv" >
                    <button class="btn btn-primary btn-block btn-lg" type="button" id="checkout">Checkout</button></div>
					</div>


            </div>
        </div>

    </div>
       <div class="card" >

  <div class="card-body">
    <h5 class="card-title">Delivery Details</h5>
      <div class="card">
      <div class="card-body">
        <h5 class="card-title text-primary">customer details</h5>

                <div class="product-specs">
                    <div><span class="font-weight-bold">Name: </span><span class="value" id="cusName">Amal Perera</span></div>
                    <div><span class="font-weight-bold">Telephone: </span><span class="value" id="cusPhone">0777123456</span></div>
                    <div><span class="font-weight-bold">Address: </span><span class="value" id="cusAddress">No 123, Matara Road, Galle.</span></div>
                </div>


      </div>
    </div>
    

  </div>
</div>

</div></section>
    </main>
    
	 <?php include("assets/common/mainFooter.php"); ?>	
	  <script src="https://www.paypal.com/sdk/js?client-id=AeA0QBdLbeTLYNHTYt31mIWg-fWC1k8sRMsTMUYYmI-tUR73psWuZnGFRwE1knzTJvSQM3bHnXClTzCj&currency=USD"></script>
    <script src="assets/js/onlineOrder.js"></script>
    <script src="assets/js/shoppingCart.js"></script>
	 <script>
        $("#deliveryRedioDiv").hide();
    </script>
</body>


