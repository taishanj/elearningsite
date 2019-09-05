<?php
	/* This file used as include or required in all pages that need to be connected to database */
	$servername = "localhost";
	$username = "your_username";
	$password = "your_password";
	$dbname = "elearn";
	
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>