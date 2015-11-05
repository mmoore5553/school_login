<?php 

    require 'database_connection.php';

    session_start();
    $role = $_SESSION['session_user_role'];

    $sql_query = "INSERT INTO users (username,password,role) VALUES (:username,:password,:role)";
                                              
    $sql = $database_connection->prepare($sql_query);

   // $data = array('username' => $_POST['username'] , 'password' => $_POST['password'], 'role' => $_POST['role']);


                                          
    $sql->bindParam(':username', $_POST['username'], PDO::PARAM_STR);       
    $sql->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
    $sql->bindParam(':role', $_POST['role'], PDO::PARAM_STR);
    
    $data = array('username' => $_POST['username'] , 'password' => $_POST['password'], 'role' => $_POST['role']);

    $sql->execute($data); 


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
              <h2>This is Admin area.</h2>
              
              <div class ="enroll_div" >
              <h2 class="label-info">Add User</h2>
                   <form class="" role="form" action="add_user.php" method="post">
                      <div class="form-group">
                        <label for="userName">User Name:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                      </div>
                   <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="Role">Role: (Admin or User )</label>
                    <input type="text" class="form-control" id="role" name="role" placeholder="Role is admin or user">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
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
  //  <script>


  //     $(document).ready(function() {
  //    $('.enroll_div').hide();
  // });
      

  //     $('.enroll_link').click(function(e) {
  //     e.preventDefault(); 
  //     $('.enroll_div').toggle(); 
  //     });
      

  //   </script>


    </body>
</html>