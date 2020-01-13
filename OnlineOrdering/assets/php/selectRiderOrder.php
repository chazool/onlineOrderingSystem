<?php
   
	include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController->selectRiderOrder($_POST["riderid"]);
    echo json_encode($result);
	
	
	
  

?>