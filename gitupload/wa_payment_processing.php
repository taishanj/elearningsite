<?php
	require("db/wa_db_connection.php");
	session_start();	
	if (isset($_SESSION['id']))
	{
	    include("logged_in_header.php");
	}
	else 
	{
	    header("Location: wa_register_new_user.php");
	}

		try
		{
			
			//$already_enrolled = false;
			$course_choice= $users_id = '';
			$username = $_SESSION['name'];
			$users_id = $_SESSION['id'];
			$course_id = $_SESSION['COURSE_id'];
			$course_choice = $_SESSION['COURSE_name'];		
			if(isset($course_choice))
			{
				$already_enrolled_query = $conn->prepare("SELECT USER_course_chosen_id FROM Users WHERE USER_unique_id= ?");
				$already_enrolled_query->execute([$users_id]);
		      $enrollment_check = $already_enrolled_query->fetch();
				if($enrollment_check)
				{
					//echo "Enrolled already";
					header("Location: wa_user_dashboard.php");
					
				}
				else
				{	
					$add_to_database = "INSERT INTO Users (USER_unique_id, USER_course_chosen_id, USER_coursename, USER_percent_completed,USER_firstname)
	    		 			 				  VALUES ('$users_id','$course_id','$course_choice',0,'$username')";
	   		   $conn->exec($add_to_database);
	   		   header("Location: wa_user_dashboard.php");
				}
			}
      }
      catch(PDOException $e)
		{
			 echo $add_to_database . "<br>" . $e->getMessage();
		}
      $conn = null;
?>

