<?php
	require("connection.php");
	
	session_start();
		if ( isset( $_SESSION['id'] ) )
		 {
			
			require_once("logged_in_header.php");
			
		} 
		else 
		{
		    // Redirect them to the login page
		    header("Location: register_form.php");
		}
		
		if(isset($_POST["counted"])){
		    echo "Your score is: " . $_POST["counted"];
		} 
		
		
	try
	{
		//prepared statement that fetches user id in order to update click counter score
		$stmt = $conn->prepare("SELECT * FROM MyGuests WHERE user_id=?");
		$stmt->execute([$_SESSION['id']]); 
		$user = $stmt->fetch();
		if ($user) 
		{
		    // email/user id exists found
		    $acct_exists = true;
		    
		    //update scores
		    $sql = "UPDATE MyGuests SET clickCount='$_POST[counted]' WHERE user_id=$_SESSION[id]";
		    
	   	 // use exec() because no results are returned
	    	$update_stmt = $conn->prepare($sql);
	    	$update_stmt->execute();
		} 
	
	}
	catch(PDOException $e)
	{
	    echo $sql . "<br>" . $e->getMessage();
	}
	
	//End database connection
	$conn = null;
?>