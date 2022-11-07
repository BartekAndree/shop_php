<?php

	session_start();
	
	if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
	{
		header('Location: chuj.php');
		exit();
	}

	require_once "database_connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$email = htmlentities($email, ENT_QUOTES, "UTF-8");
	
		if ($results = @$connection->query(
		sprintf("SELECT * FROM users WHERE email='%s'",
		mysqli_real_escape_string($connection,$email))))
		{
			$found_users = $results->num_rows;	
			if($found_users>0)
			{
				$user_data = $results->fetch_assoc();
				
				if (password_verify($password, $user_data['password']))
				{
					$_SESSION['logged_flag'] = true;
					$_SESSION['id'] = $user_data['id'];
					$_SESSION['email'] = $user_data['email'];
					$_SESSION['isadmin'] = $user_data['isadmin'];
					$_SESSION['alert_type'] = 'success';
					
					unset($_SESSION['alert_msg']);
					$results->free_result();
					header('Location: index.php');
				}
				else 
				{
					$_SESSION['alert_msg'] = 'Nieprawidłowy email lub hasło!';
					$_SESSION['alert_type'] = 'danger';
					header('Location: index.php');
				}
				
			} else {
				
				$_SESSION['alert_msg'] = 'Nieprawidłowy email lub hasło!';
				$_SESSION['alert_type'] = 'danger';
				header('Location: index.php');
				
			}
			
		}
		
		$connection->close();
	}
	
?>