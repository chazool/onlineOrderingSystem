<?php
   
	include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController->selectOnlineRider();
    echo json_encode($result);
	
	
	
  

?>