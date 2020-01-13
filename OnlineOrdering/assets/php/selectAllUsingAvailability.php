<?php
   
	 include_once 'FoodController.php';
    $foodController = new FoodController();
    $result = $foodController->selectAllUsingAvailability($_POST["availability"]);
    echo json_encode($result);
	
	
	
  

?>