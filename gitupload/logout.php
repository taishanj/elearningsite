<?php
	session_start();
   session_destroy(); 
	$_SESSION['id'] = array();
	if ( isset( $_SESSION['id'] ) )
	{
		header("location:index.php");
	} 
	else
	{
   	header("location:index.php");
	}
?>
