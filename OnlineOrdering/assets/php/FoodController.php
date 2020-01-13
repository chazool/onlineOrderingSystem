<?php
include_once 'Dao.php';

class FoodController
{

    /* Fetch All */
    public function readData($menu,$dishes)
    {
        try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
            // $sql="SELECT * FROM fooditem ";
			
			if($menu == "-1" &&  $dishes == "-1"){
				 $sql= "SELECT *,(SELECT type FROM cafeteria.menu where menu_id=fooditem.menu limit 1) as menutype FROM fooditem where available = 1 ";
			}
			else if ($dishes == "-1") {
				 $sql= "SELECT *,(SELECT type FROM cafeteria.menu where menu_id=fooditem.menu limit 1) as menutype FROM fooditem where available = 1 and menu=" . $menu . "   ";
			}
			else if($menu == "-1"){
				 $sql= "SELECT *,(SELECT type FROM cafeteria.menu where menu_id=fooditem.menu limit 1) as menutype FROM fooditem where  available = 1 and  dishes = '" . $dishes . "'  ";
			}	
			else{
				 $sql= "SELECT *,(SELECT type FROM cafeteria.menu where menu_id=fooditem.menu limit 1) as menutype FROM fooditem where  available = 1 and menu=" . $menu . " and  dishes = '" . $dishes . "'  ";
			}
			
			
           // $sql = "SELECT * FROM `abc` where menu=" . $menu . " ORDER BY id DESC";
           // $sql= "SELECT * FROM fooditem where menu=" . $menu . " and  dishes = '" . $dishes . "'  ";
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
	
	
	 public function selectAllUsingAvailability($availability)
    {
        try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
			
			$sql= "SELECT *,(SELECT type FROM menu where menu_id=fooditem.menu limit 1) as menutype FROM fooditem WHERE available = " . $availability ;
			
			
			
           // $sql = "SELECT * FROM `abc` where menu=" . $menu . " ORDER BY id DESC";
           // $sql= "SELECT * FROM fooditem where menu=" . $menu . " and  dishes = '" . $dishes . "'  ";
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


public function updateAvailability($availability , $id)
    {
      	
        
        $dao = new Dao();
        
        $conn = $dao->openConnection();       
      
		
		$sql = "UPDATE fooditem set available =" . $availability . "  WHERE id =" . $id;
        
        $conn->query($sql);
        $dao->closeConnection();
    }
  
   
}

?>