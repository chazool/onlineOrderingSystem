<?php
 
	$userName = $_POST["customer_fname"];
$userId = $_POST["bPartnerId"];
$userRole = $_POST["userRole"];
$userEmail = $_POST["Email"];
$userPhone = $_POST["telephone"];

//
session_start();
$_SESSION["logedUserName"] = $userName;
$_SESSION["LogedUserId"] = $userId;
$_SESSION["LogedUserRole"] = $userRole;
$_SESSION["LogedUserEmail"] = $userEmail;
$_SESSION["LogedUserPhone"] = $userPhone;
//
//header('Location: index.php');
	

?>