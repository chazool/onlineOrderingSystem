$(document).ready(function() {
	
	
		//$.notify("Access granted", "success");
	//$.notify("BOOM!", "error");
	
	$('#availableTable').DataTable({
            
             select:"single",
           
             "columnDefs": [
                 {                   
                 },
                 {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-danger btn-sm'>Delete</button>"
              }
             ],
             "order": [[1, 'asc']]
         });
		 
		 
		 $('#nonAvailableTable').DataTable({
            
             select:"single",
           
             "columnDefs": [
                 {                   
                 },
                 {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-success btn-sm'>Add</button>"
              }
             ],
             "order": [[1, 'asc']]
         });
	//--------------------------------------
	
	
	 $('#availableTable tbody').on( 'click', 'button', function () {
      // alert("AAA");
		 var table = $('#availableTable').DataTable();
		var data = table.row( $(this).parents('tr') ).data();
		  
		
		 
		
				//-----
				$.ajax({
				url: 'assets/php/updateFoodAvailability.php',
				type: 'POST',
				data: {"availability": 0 , "id" : data[0]},
				success:function(response){
					
					$.notify("Delete Food!  "+ data[1], "error");
					 loadPage();
					 
				}
					
					
				
				
				
				});
			})
				
				
				
		
	$('#nonAvailableTable tbody').on( 'click', 'button', function () {
      // alert("AAA");
		 var table = $('#nonAvailableTable').DataTable();
		var data = table.row( $(this).parents('tr') ).data();
		
		 $.ajax({
				url: 'assets/php/updateFoodAvailability.php',
				type: 'POST',
				data: {"availability": 1 , "id" : data[0]},
				success:function(response){
					
					$.notify("Add New Food! "+ data[1], "success");
					 loadPage();
					 
				}
					
					
				
				
				
				});
		 
		 
		 
		 
		 
		} )
	
	
	// loading -------
	
	loadPage(); //updateFoodAvailability.php
	
	
	function loadPage(){
		
		loadAvailabilFood('#nonAvailableTable' ,0);
		loadAvailabilFood('#availableTable', 1);
		
	}
	
	
	
	function loadAvailabilFood(table,availability ){
		//alert("loadPage");
			$.ajax({
				url: 'assets/php/selectAllUsingAvailability.php',
				type: 'POST',
				data: {"availability": availability },
				success:function(response){
					
					 var t = $(table).DataTable();
					 t.clear().draw();
					 
					$.each( JSON.parse(response), function( key, value ) {	

						t.row.add( [ value.id , value.fooditem_name] ).draw( false );
					 
					});
				}
			});
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//end ---------------------------------------
} );