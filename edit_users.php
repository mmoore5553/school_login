<?php 

    require 'database_connection.php';

    session_start();
    $role = $_SESSION['session_user_role'];

         $id = $_REQUEST['id'];

        if(isset($_POST['submit'])){

          $sql_query = "UPDATE users SET
            username = :username, 
            password = :password, 
            role = :role
            WHERE user_id = :id";

                                                    
          $sql = $database_connection->prepare($sql_query);

                                                
          $sql->bindParam(':username', $_POST['username'], PDO::PARAM_STR);       
          $sql->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
          $sql->bindParam(':role', $_POST['role'], PDO::PARAM_STR);
          $sql->bindParam(':id', $_POST['user_id']);
          
          //$data = array('username' => $_POST['username'] , 'password' => $_POST['password'], 'role' => $_POST['role']);

          $sql->execute(); 


          //header("Location: list_users.php");
      
        }
		 
		 
         $sql_query = $database_connection->prepare("SELECT * FROM users where user_id = '{$_GET['id']}'");
         $sql_query->execute(); 
          
         $results = $sql_query->fetch( PDO::FETCH_ASSOC );

        $username = $results['username'];
        $password = $results['password'];
        $role = $results['role'];

       //echo $results['username']. ;

        //print_r($results);

		
		
		

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Course System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  <body>
    
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand enroll_link" href="">Add User</a>
          <a class="navbar-brand add_course_link" href="#">Add Course</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['session_username'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container homepage">
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6 welcome-page">
          
              <div class ="enroll_div" >
              <h2 class="label-info">Edit User</h2>
                   <form class="" role="form" action="edit_users.php?id=<?php echo $id?>" method="post">
                      <div class="form-group">
                        <label for="userName">User Name:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo $username ?>">
                      </div>
                   <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php echo $password ?>">
                  </div>
                  <div class="form-group">
                    <label for="Role">Role: (Admin or User )</label>
                    <input type="text" class="form-control" id="role" name="role" placeholder="Role is admin or user" value="<?php echo $role ?>">
                  </div>
				   <input type="hidden" class="form-control" id="user_id" name="user_id"  value="<?php echo  $id; ?>">
                  <button type="submit" name= "submit"class="btn btn-default">Submit</button>
                 </form>
              </div>

              </div>
            </div>
          <div class="col-md-3"></div>
        </div>
    </div>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


    </body>
</html>