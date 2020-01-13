<?php
include_once 'Dao.php';

class OnlineOrderController
{
   public function add($dataArray)
    {
		
		
       $cus_id = $_POST['cus_id'];
       $order_date_and_time = $_POST['datetime'];
       $distance_charge = $_POST['Delivery'];
       $tax = $_POST['tax'];
	   $servicecharge = $_POST['servicecharge'];
		
		$grossAmount = $_POST['grossAmount'];
		$netAmount = $_POST['netAmount'];
		
		$note = $_POST['note'];
		$obtain_option = $_POST['obtainOption'];
		$need_time = $_POST['need_time'];
		//need_time
		
        
        $dao = new Dao();
        
        $conn = $dao->openConnection();
		
        $sql ="INSERT INTO online_order (cus_id, order_date_and_time, distance_charge, tax, servicecharge, grossAmount, netAmount, orderStatus, note, obtain_option , need_time ) VALUES ( " . $cus_id . ",'" . $order_date_and_time . "'," . $distance_charge . "," . $tax . "," . $servicecharge . "," . $grossAmount . " ," . $netAmount . ",'pending','" . $note . "' , '" . $obtain_option . "'  , '" . $need_time . "'   );";
		//$sql ="INSERT INTO online_order (cus_id) VALUES ( 22  );";
		
		
		// $conn->query($sql);
		
		$conn->exec($sql);
		$last_id = $conn->lastInsertId();
		
		//$lastInsertedPeopleId= $conn->insert_id;
		
        $dao->closeConnection();
    
	
	  return $last_id ;
	  
	}
	
	 public function addOrderItem($dataArray)
    {
		
        $order_id = $_POST['order_id'];
        $item_Id = $_POST['ItemId'];
        $qty = $_POST['Qty'];
        $price = $_POST['Price'];
        
        $dao = new Dao();
        
        $conn = $dao->openConnection();
        
        $sql = "INSERT INTO onlineorder_item (order_id,item_Id,qty,price) VALUES ('" . $order_id . "','" . $item_Id . "','" . $qty . "','" . $price . "')";
        $conn->query($sql);
        $dao->closeConnection();
    
	
	}

   public function selectOrderUsingStatus($status)
    {
        try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
            
			$sql= "SELECT * FROM online_order where orderStatus='" . $status . "'  ";
			
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
  
  
	public function updateOrderColumn($dataArray)
    {
        $order_id = $_POST['order_id'];
        $dateAndTime = $_POST['dateAndTime'];
        $columnName = $_POST['columnName'];  
		$orderStatus = $_POST['orderStatus'];  	
        
        $dao = new Dao();
        
        $conn = $dao->openConnection();       
      
		
		$sql = "UPDATE online_order SET " . $columnName . " = '" . $dateAndTime . "' , orderStatus = '" . $orderStatus . "'  WHERE order_id = " . $order_id;
        
        $conn->query($sql);
		
		
		if($orderStatus  == 'delivered'){
			
				//riderId
			$sql_Update= "UPDATE bpartner SET online = 1  WHERE bPartnerId = " . $_POST['riderId'] . "  ;";
			
			
			$conn->query($sql_Update);
		
		}
		
		
		
		
		
		
		
        $dao->closeConnection();
    }
  
     
    public function addOrder_confirmation($dataArray)
    {			
       $order_id = $_POST['order_id'];
       $cheff_id = $_POST['cheff_id'];
       $estimate_time = $_POST['estimate_time'];
	   
        $dao = new Dao();
        
        $conn = $dao->openConnection();
		
        $sql ="INSERT INTO order_confirmation ( order_id, cheff_id,  estimate_time) VALUES ( " . $order_id . " , " . $cheff_id . " , '" . $estimate_time . "' );";
		
		$conn->exec($sql);
		$last_id = $conn->lastInsertId();
		
        $dao->closeConnection();
    
	
	  return $last_id ;
	  
	}
  
    
   public function assignRider($order_id ,$riderid)
    {
       // try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
			
			//sql Quary --------------------------------------------------------------------------
			$sql_Insert= "INSERT INTO delivery ( order_id, rider_id) VALUES ( " . $order_id . "  , " . $riderid . "  );";
			
			$sql_Update= "UPDATE bpartner SET online = 0  WHERE bPartnerId = " . $riderid . "  ;";
			
			//$sql_select= "SELECT * FROM bpartner where bPartnerId =  ( SELECT rider_id FROM cafeteria.delivery where order_id= " . $order_id . "  )";
			
			// Execute Quary --------------------------------------------------------------------------
            
			$conn->query($sql_Insert);
			
			$conn->query($sql_Update);
			
         /*   $resource = $conn->query($sql_select);
            
            $result = $resource->fetchAll(PDO::FETCH_ASSOC);
            
            $dao->closeConnection();
        } catch (PDOException $e) {            
            echo "There is some problem in connection: " . $e->getMessage();
        }
        if (! empty($result)) {
            return $result;
        }
		*/
    }
  
  
   public function selectOrderIterm($order_id){
	  
	      try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
			
			$sql= "SELECT * , (SELECT fooditem_name FROM  fooditem fi where fi.id=oi.item_Id) as fooditem_name FROM  onlineorder_item oi where oi.order_id =  ". $order_id  ;
			
			//$sql= "SELECT * FROM  onlineorder_item  where order_id = ";
			
			// Execute Quary --------------------------------------------------------------------------
           
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
  
  
  
  
  //Select Online  Rider Funtion 
  public function selectOnlineRider(){
	    
	      try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
			
			$sql= "SELECT bPartnerId FROM bpartner bp where bp.userRole='rider' and bp.online = true  limit 1";
					          
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



	public function selectRiderOrder($riderId){
		
		
		  try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
			
			$sql= "SELECT	oo.order_id,b.customer_fname,b.customer_lname,b.address,b.telephone,oo.netAmount,oo.grossAmount,oo.servicecharge,oo.distance_charge	 FROM delivery d inner join online_order oo on oo.order_id=  d.order_id	inner join  bpartner b on b.bPartnerId= oo.cus_id	where d.rider_id=" . $riderId . " and oo.orderStatus = 'redy' ";
					          
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



	
	public function SelectOrder($order_id){
		
		 try {
            
            $dao = new Dao();
            
            $conn = $dao->openConnection();
			
			$sql= "SELECT * FROM online_order WHERE order_id=". $order_id  ;
			
			//$sql= "SELECT * FROM  onlineorder_item  where order_id = ";
			
			// Execute Quary --------------------------------------------------------------------------
           
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