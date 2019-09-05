<?php
session_start();
require("connection.php");
		//Secure form handling
		$email = $password = "";
		if($_SERVER["REQUEST_METHOD"] = "POST")
		{
			$email = test_input($_POST['email']);
			$password = test_input($_POST['pwd']);
		}
		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$stmt = $conn->prepare("SELECT * FROM MyGuests WHERE email = ?");
		$stmt->execute([$email]);
		$user = $stmt->fetch();
		
		//password verified here
		if ($user && password_verify($password, $user['password']))
		{
    		$_SESSION['id'] = $user['user_id'];
    		$_SESSION['firstname'] = $user['firstname'];
    		$_SESSION['email'] = $user['email'];
    		$_SESSION['clickCount'] = $user['clickCount'];
    		
   	   header('location: member_data.php');
		}
		else
		{
			echo "invalid password";
			//header('location: login_form.php');
		}
?>