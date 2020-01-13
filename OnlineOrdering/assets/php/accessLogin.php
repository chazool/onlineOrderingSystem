<?php
   
	include_once 'UserController.php';
    $userController = new UserController();
    $result = $userController->login($_POST["email"], $_POST["password"]   );
    echo json_encode($result);
	
	

?>