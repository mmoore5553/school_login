<?php
   // define database related variables
   $database = 'class';
   $host = 'localhost';
   $user = 'root';
   $pass = '';

   // try to conncet to database
   try {
         $database_connection = new PDO("mysql:dbname=". $database .";host=". $host .";port=3306", $user, $pass);
         echo "You are connected to your database <br/>";
 
         // $sql_query = $database_connection->prepare("SELECT * FROM users");
         // $sql_query->execute(); 
          
         // $result = $sql_query->fetch();
         // echo $result['username']. "<br/>";
         // echo $result['role']. "<br/>";

         // print_r($result);


       }catch (Exception $e) {
         print "Error!: " . $e->getMessage() . "<br/>";
         die();
       }

?>
