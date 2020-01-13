<?php
   
	include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController->assignRider($_POST["order_id"],$_POST["riderid"]);
    echo json_encode($result);
	
	
	
  

?>