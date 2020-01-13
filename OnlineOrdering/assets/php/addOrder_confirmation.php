<?php
   
	include_once 'OnlineOrderController.php';
    $onlineOrderController = new OnlineOrderController();
    $result = $onlineOrderController-> addOrder_confirmation($_POST);
    echo json_encode($result);	
  

?>