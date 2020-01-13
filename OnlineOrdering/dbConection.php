<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename="cafeteria";

// Create connection
try {
$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  throw new Exception('Unable to connect');
}
else{
//echo "Connected successfully";
}}

catch(Exception $e)
{
    echo $e->getMessage();
}
?>

</body>
</html>
