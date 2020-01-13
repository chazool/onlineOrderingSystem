<?php
   
	 include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController->addOrderItem($_POST);
    echo json_encode($result);
	
	
	
  

?>