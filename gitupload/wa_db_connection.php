<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "webacademy";
	
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	define('BASE_PATH','index.php');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'webacademy');
	define('DB_USER','root');
	define('DB_PASSWORD','');
?>