<?php
	require("db/wa_db_connection.php");
	session_start();
	
		if(isset($_POST['selected']))
		{
	      $_SESSION['course_library_choice'] = $_POST['selected'];
      }
		header("location: wa_course_landing_page.php");	
?>
