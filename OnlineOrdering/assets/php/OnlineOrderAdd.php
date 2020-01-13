<?php
   
	include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController->add($_POST);
    echo json_encode($result);	
  

?>