<?php
	require("db/wa_db_connection.php");
	session_start();
	if ( isset( $_SESSION['id'] ) )
	{
		require_once("logged_in_header.php");
	} 
	else 
	{
	    header("Location: wa_register_new_user.php");
	}	
		try
		{
			if(isset($_POST["counted"]))
			{
				$if_user_registered = $conn->prepare("SELECT * FROM MyGuests WHERE STU_id=?");
		      $if_user_registered->execute([$_SESSION['id']]); 
		      $user = $stmt->fetch();
			      if ($user) 
			      {
				      // email found
			         $acct_exists = true;
			         $sql = "UPDATE MyGuests SET STU_clickCount='$_POST[counted]' WHERE STU_id=$_SESSION[id]";
		    	      $update_stmt = $conn->prepare($sql);
		    	      $update_stmt->execute();
			      } 
			}
      }
      catch(PDOException $e)
		{
			 echo $sql . "<br>" . $e->getMessage();
		}
      $conn = null;
?>