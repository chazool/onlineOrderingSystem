<?php include("assets/common/mainHeader.php"); ?>
    <main class="page registration-page"><section class="clean-block clean-form dark">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">Food Menu</h2>
        </div>
           <div class="container box">  
                   
                <label>Menu Type</label>  
                <input type="text" name="type" id="type" class="form-control" />  
                <br />  
                <label>Active: Yes / No</label>  
                <input type="text" name="active" id="active" class="form-control" />  
                <br /><br />  
                <div align="center">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="btn btn-warning">Add</button>  
                </div>  
                <br />  
                <br />  
                <div id="result" class="table-responsive">  
                </div>  
           </div> 
           </main>
 <?php include("assets/common/mainFooter.php"); ?>			   
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      fetchUser();  
      function fetchUser()  
      {  
           var action = "select";  
           $.ajax({  
                url : "select.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data){  
                     $('#type').val('');  
                     $('#active').val('');  
                     $('#action').text("Add");  
                     $('#result').html(data);  
                }  
           });  
      }  
      $('#action').click(function(){  
           var type = $('#type').val();  
           var active = $('#active').val();  
           var id = $('#user_id').val();  
           var action = $('#action').text();  
           if(type != '' && active != '')  
           {  
                $.ajax({  
                     url : "action.php",  
                     method:"POST",  
                     data:{type:type, active:active, id:id, action:action},  
                     success:function(data){  
                          alert(data);  
                          fetchUser();  
                     }  
                });  
           }  
           else  
           {  
                alert("Both Fields are Required");  
           }  
      });  
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"fetch_new.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#action').text("Edit");  
                     $('#user_id').val(id);  
                     $('#type').val(data.type);  
                     $('#active').val(data.active);  
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data)  
                     {  
                          fetchUser();  
                          alert(data);  
                     }  
                })  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  
 </script>  
 