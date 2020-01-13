<?php
include_once 'Dao.php';

class CustomerController
{

    
    public function select($cusId)
    {
        try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
            
			$sql= "SELECT * FROM bpartner where bPartnerId= " . $cusId . "  ";
			
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