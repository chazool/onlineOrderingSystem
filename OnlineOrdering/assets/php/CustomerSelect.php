<?php
   
	include_once 'CustomerController.php';
    $customerController = new CustomerController();
    $result = $customerController->select($_POST["custId"]);
    echo json_encode($result);
	
	
	
  

?>