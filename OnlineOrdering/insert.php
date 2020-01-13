<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO fooditem (fooditem_name, price, description, prepared_Time, dishes, menu, image) 
			VALUES (:fooditem_name, :price,:description,:prepared_Time, :dishes, :menu, :image)
		");
		$result = $statement->execute(
			array(
				':fooditem_name'	=>	$_POST["fooditem_name"],
				':price'	        =>	$_POST["price"],
				':description'	    =>	$_POST["description"],
				':prepared_Time'	=>	$_POST["prepared_Time"],
				':dishes'	        =>	$_POST["dishes"],
				':menu'	            =>	$_POST["menu"],
				':image'		    =>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE fooditem
			SET fooditem_name = :fooditem_name, price = :price, description = :description, prepared_Time = :prepared_Time, dishes = :dishes,menu = :menu,  image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':fooditem_name'	=>	$_POST["fooditem_name"],
				':price'	        =>	$_POST["price"],
				':description'	    =>	$_POST["description"],
				':prepared_Time'	=>	$_POST["prepared_Time"],
				':dishes'	        =>	$_POST["dishes"],
				':menu'	            =>	$_POST["menu"], 
				':image'		    =>	$image,
				':id'			    =>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>