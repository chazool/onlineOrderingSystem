<?php

include('config.php');

$email = $_POST['email'];
$pass = $_POST['password'];

$status = 0;

if(empty($email) || empty($pass)){
    $status = 1;
}
else{
    $sql = "SELECT * FROM customer WHERE email = :email AND password = :pass";
    $stmt = $connection->prepare($sql);   
    $stmt->bindparam(':email', $email);
    $stmt->bindparam(':pass', $pass);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $status = 2;
    }
    else{
        $status = 3;
    }
}

echo $status;
?>