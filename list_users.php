<?php 

    require 'database_connection.php';

    session_start();
    $role = $_SESSION['session_user_role'];

 
         $sql_query = $database_connection->prepare("SELECT * FROM users");
         $sql_query->execute(); 
          
         $results = $sql_query->fetchAll( PDO::FETCH_ASSOC );

         print_r($results);


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
          <a class="navbar-brand enroll_link" href="add_user.php">Add User</a>
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
    <div class="table-responsive"> 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach( $results as $row ){
                 echo "<tr><td>";
                 echo $row['user_id'];
                 echo "</td><td>";
                 echo $row['username'];
                 echo "</td><td>";
                 echo $row['role'];
                 echo "</td><td>";
                 echo "<a style='color: red;' href='delete_users.php?id=" . $row['user_id'] . "'>X</a>";
                 echo "</td><td>";
                 echo "<a href='edit_users.php?id=" . $row['user_id'] . "'>Edit</a>";
                 echo "</td>";
                 echo "</tr>";
                    }
              ?>
            </tbody>
        </table>
    </div>
        </div>
    </div>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>