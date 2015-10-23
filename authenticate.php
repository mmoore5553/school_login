<?php 
	require 'database_connection.php';

	session_start();

	$username = "";
	$password = "";
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];

	}
	
	// echo $username ." : ".$password;

	$sql_query = 'SELECT * FROM users WHERE username=:username AND password=:password';

	$results = $database_connection->prepare($sql_query);

	$results->execute(array(':username' => $username, ':password' => $password));


	if($results->rowCount() == 0){
		
	}else{

		$row = $results->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();

		$_SESSION['session_user_id'] = $row['id'];
		$_SESSION['session_username'] = $row['username'];
        $_SESSION['session_user_role'] = $row['role'];

        // echo $_SESSION['session_user_role'];
		session_write_close();

		if( $_SESSION['session_user_role'] == "admin"){
			header('Location: admin_homepage.php');
		}else{
			header('Location: user_homepage.php');
		}
		
		
	}


?>