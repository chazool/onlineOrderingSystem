<?php
$userName = $_POST['email'];
$userId = 2;
$userRole = "rider";

//
session_start();
$_SESSION["logedUserName"] = $userName;
$_SESSION["LogedUserId"] = $userId;
$_SESSION["LogedUserRole"] = $userRole;
//
header('Location: index.php');
?>

