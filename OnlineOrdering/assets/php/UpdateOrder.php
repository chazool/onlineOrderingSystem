<?php
   
	include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController->updateOrderColumn($_POST );
    echo json_encode($result);
	
	

?>