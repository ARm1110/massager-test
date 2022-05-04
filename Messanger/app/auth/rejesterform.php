<?php
include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:home.php');
}

if(isset($_POST["register"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$check_query = "
	SELECT * FROM login 
	WHERE username = :username
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':username'		=>	$username
	);
	if($statement->execute($check_data))	
	{
		if($statement->rowCount() > 0)
		{
			$message .= 'Username already taken'."\n";
		}
		else
		{
			if(empty($username))
			{
				$message .= 'Username is required'."\n";
			}
			if(empty($password))
			{
				$message .= 'Password is required'."\n";
			}
			else
			{
				if($password != $_POST['confirm_password'])
				{
					$message .= 'Password not match'."\n";
				}
			}
			if($message == '')
			{
				$data = array(
					':username'		=>	$username,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO login 
				(username, password) 
				VALUES (:username, :password)
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$message = "Registration Completed"."\n";
				}
			}
		}
	}
}