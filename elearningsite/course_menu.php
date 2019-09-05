
	<?php
	/*This page caused considerable difficulty. The main issue being ability to generate HTML content
		depending upon how many courses are currently available. 
		-Still unable to select courses by clicking to return specific course info
		-fetch() returns an array and each time user clicks on a course it is only after the while loop
		is completed that course content is generated and it is always the very last item in the array (not the one selected)
	*/
	include("connection.php");
	
	/*Session initiated and session variable is checked. However not particularly useful at the moment
		it simply generates a different heading to the website depending on whether users logged in or not
	*/
	session_start();
	if ( isset( $_SESSION['id'] ) ) {
	    // Grab user data from the database using the user_id
	    // Let them access the "logged in only" pages
		require_once("logged_in_header.php");
	} else {
	    // Redirect them to the login page
	    include("header.php");
	}
	?>
	
			//Top of the page but below menu bar layout/style
			<div class="w3-container w3-padding-32 id=projects">
	    		<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Courses</h3>
	  		</div>
	<?php
	try 
	{
		//prepared statement to select all courses from the database elearn
	    $stmt = $conn->prepare("SELECT coursename,courseimg,coursedesc FROM Courses"); 
	    $stmt->execute();
	
	    // set the resulting array to associative
	   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	   
	  //while loop that is likely the issue causing problems with selecting individual courses	
	   while($row = $stmt->fetch())
	   {	
	?>
	    <div class="w3-col l3 m6 w3-margin-bottom">
	      <div class="w3-display-container">
	        <div class="w3-display-topleft w3-black w3-padding"><?php echo $row['coursename'];?></div>
	      	  <a href="course_landing_page.php">
	  					<img src="imgs/<?php echo$row['courseimg'];?>" alt="House" style="width:95%">
	  					<?php //$x=$row['courseimg']; $_SESSION['courseimg'] = $x;?>
				  </a>
	        
	      </div>
	    </div>
	
	<?php
			}//end while
	}
	catch(PDOException $e) 
	{
		 
	    echo "Error: " . $e->getMessage();
	}
	
	//End database connection
	$conn = null;
	?>


