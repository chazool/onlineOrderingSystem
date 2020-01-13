<?php  
 //action.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "cafeteria");  
      if($_POST["action"] =="Add")  
      {  
           $type = mysqli_real_escape_string($connect, $_POST["type"]);  
           $active = mysqli_real_escape_string($connect, $_POST["active"]);  
           $procedure = "  
                CREATE PROCEDURE insertUser(IN type varchar(20), active varchar(20))  
                BEGIN  
                INSERT INTO menu(type, active) VALUES (type, active);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertUser"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL insertUser('".$type."', '".$active."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Inserted';  
                }  
           }  
      }  
      if($_POST["action"] == "Edit")  
      {  
           $type = mysqli_real_escape_string($connect, $_POST["type"]);  
           $active = mysqli_real_escape_string($connect, $_POST["active"]);  
           $procedure = "  
                CREATE PROCEDURE updateUser(IN user_id int(11), type varchar(20), active varchar(20))  
                BEGIN   
                UPDATE menu SET type = type, active = active 
                WHERE menu_id = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateUser"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateUser('".$_POST["id"]."', '".$type."', '".$active."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteUser(IN user_id int(11))  
           BEGIN   
           DELETE FROM menu_type WHERE menu_id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteUser"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteUser('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  
