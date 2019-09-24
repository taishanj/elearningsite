	<?php
	require("db/wa_db_connection.php");
	$options = array("cost"=>4);
	$seconds = 2;

  $firstname =  $lastname = $email = $status = $password =  "";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
	  $firstname = test_input($_POST["firstname"]);
	  $lastname = test_input($_POST["lastname"]);
	  $email = test_input($_POST["email"]);
	  $password = test_input($_POST["pwd"]);
  }
  
  function test_input($data)
   {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	try
	{
		$is_user_registered = $conn->prepare("SELECT * FROM MyGuests WHERE STU_email=?");
		$is_user_registered->execute([$email]); 
		$find_user = $is_user_registered->fetch();
		if ($find_user)
	   {
	    // email found
	    $account_exists = true;
	    echo "Email was found please create account with new email";
		}
		else 
		{
		 	 if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
		 	 {
   				 // Return Error - Invalid Email
   				 header('location: blank.php');
	 		 }
	 		 else
	 		 {
   			 // Return Success - Valid Email
   			 $hash_password = password_hash($password,PASSWORD_BCRYPT,$options);
	    		//Creates a new user account (email) if none already exists
	    		 $add_to_database = "INSERT INTO MyGuests (STU_firstname, STU_lastname, STU_email,STU_password)
	    		 VALUES ('$firstname','$lastname', '$email','$hash_password')";
	   		 $conn->exec($add_to_database);
	          header('Location: wa_login_form.php'); 		 
	  		 }
		}
	}//end try
	catch(PDOException $e)
	{
	    echo $sql . "<br>" . $e->getMessage();
	}
	
	$conn = null;
	
	?>
