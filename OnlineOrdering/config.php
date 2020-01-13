<?php
    $hostname = 'localhost';
    $databasename = 'cafeteria';
	$username = 'root';
    $password = '';

    try {

    $connection = new PDO("mysql:host={$hostname};dbname={$databasename}", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>