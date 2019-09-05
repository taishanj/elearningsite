<?php

	require("connection.php");
	  //array created to allow password hash - not sure how it works
	  $options = array("cost"=>4);
	  $seconds = 2;
	  //secure form handling  (W3 Schools)
	  $fname =  $lname = $email = $status = $password =  "";
	  
	  if ($_SERVER["REQUEST_METHOD"] == "POST")
	  {
		  $fname = test_input($_POST["firstname"]);
		  $lname = test_input($_POST["lastname"]);
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
		$stmt = $conn->prepare("SELECT * FROM MyGuests WHERE email=?");
		$stmt->execute([$email]); 
		$user = $stmt->fetch();
		if ($user) {
	    // email found
	    $acct_exists = true;
	    echo "Email was found please create account with new email";
	    
	    //Returns user to the index page (Not a great solution. Javascript alert for email already exists needed)
	    header('Location: index.php'); 
		}
		 //user email was not found. Therefore new account can be created
		 else 
		 {
		 	
		 //password hash generated. unable to view user password in MySQL database
	    $hash_password = password_hash($password,PASSWORD_BCRYPT,$options);
	    
	    /*Creates a new user account (email) if none already exists*/
	    $sql = "INSERT INTO MyGuests (firstname, lastname, email,password)
	    VALUES ('$fname','$lname', '$email','$hash_password')";
	    
	    // use exec() because no results are returned
	    $conn->exec($sql);
	    
		}
	}
	
	catch(PDOException $e)
	{
	    echo $sql . "<br>" . $e->getMessage();
	}
	
	//End database connection
	$conn = null;


?>
