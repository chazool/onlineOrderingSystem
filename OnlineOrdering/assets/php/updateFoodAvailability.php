<?php
   
	 include_once 'FoodController.php';
    $foodController = new FoodController();
    $result = $foodController->updateAvailability($_POST["availability"] ,$_POST["id"]);
    echo json_encode($result);
	
	
	
  

?>