<?php
   
	 include_once 'FoodController.php';
    $foodController = new FoodController();
    $result = $foodController->readData($_POST["menu"],$_POST["dishes"]);
    echo json_encode($result);
	
	
	
  

?>