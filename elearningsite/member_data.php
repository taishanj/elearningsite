<?php

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
	
	?>

	<html>
	<body>
		
	  <!-- Project Section -->
	  <div class="w3-container w3-padding-32" id="projects">
	    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Courses</h3>
	    
	    //Display of user's firstname. Profile pic feature needed
	    <h4><?php echo "Welcome to your dashboard " . $_SESSION['firstname'] . ".<br>";?></h4>
	    
	    //Display of user's previous tally after previous login on click counter
	    <h4><?php echo "Your previous click tally was " . $_SESSION['clickCount'] . ".<br>";?></h4>
	  </div>
	  <div class="main">
	  </div>
	
	</body>

<?php include("footer.php");?>
