<?php
session_start();
require("db/wa_db_connection.php");
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

		$is_user_registered = $conn->prepare("SELECT * FROM MyGuests WHERE STU_email = ?");
		$is_user_registered->execute([$email]);
		$find_user = $is_user_registered->fetch();
		if ($find_user && password_verify($password, $find_user['STU_password']))
		{
    		$_SESSION['id'] = $find_user['STU_id'];
    		$_SESSION['name'] = $find_user['STU_firstname'];
    		$_SESSION['email'] = $find_user['STU_email'];
    		$_SESSION['clickCount'] = $find_user['STU_clickCount'];
   	   header('location: wa_user_dashboard.php');
		}
		else
		{
			echo "invalid password";
			//header('location: login_form.php');
		}
?>