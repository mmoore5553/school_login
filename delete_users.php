<?php 

    require 'database_connection.php';

    session_start();


    	  $role = $_SESSION['session_user_role'];

          $sql_query = "DELETE FROM users WHERE user_id = '{$_GET['id']}'";
                                                    
          $sql = $database_connection->prepare($sql_query);
		  
          $sql->execute(); 


          header("Location: list_users.php");
      
?>
 

