<?php
   
	include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController->SelectOrder($_POST["order_id"] );
    echo json_encode($result);
	
	

?>