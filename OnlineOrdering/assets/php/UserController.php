<?php
include_once 'Dao.php';

class UserController
{

    
    public function login($email,$password)
    {
        try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();          
						
			$sql= "SELECT * FROM cafeteria.bpartner where email='" . $email . " ' and password='" . $password . " '";
			
            $resource = $conn->query($sql);
            
            $result = $resource->fetchAll(PDO::FETCH_ASSOC);
            
            $dao->closeConnection();
        } catch (PDOException $e) {            
            echo "There is some problem in connection: " . $e->getMessage();
        }
        if (! empty($result)) {
            return $result;
        }
    }

   
}

?>