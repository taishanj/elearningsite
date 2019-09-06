<?php
	/*This page effectively is key to user taking courses/classes and recording scores and progress
		Far from complete however click counter is used as a means of testing whether variables generated here
		can be successfully stored, passed to MySQL database and then reinitiated with the last value upon re-login
	*/
	include("header.php");
	require("connection.php");
	
	session_start();
	if ( isset( $_SESSION['id'] ) ) 
	{
	    // Grab user data from the database using the user_id
	    // Let them access the "logged in only" pages
	    include("logged_in_header.php");
	} else {
	    // Redirect them to the login page
	    header("Location: register_form.php");
	}
	
	?>
	
	<div style="height: 100px;">
		<h4><?php echo "Continue your lessons: " . $_SESSION['firstname'] . ".<br>";?></h4>
	</div>
	
	
	<div>
	//Video music playlist unrelated to actual course content but basically shows how it will be set up
	<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLqPENa8iy0CxwHk60OGKzkbfezmf-EG-F"
	 frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	
	<!--Click counter which displays number of clicks on screen-->
	<div style="background:grey" class="progress">
		 <h3>Click Counter</h3>
	    <button id="clickme">Click me </button>
	    <span id="counted">0</span>
	</div>
	
	
	<!--Result button which results in Ajax call and passing of data to lesson_scores.php-->
	<div style="background:orange">
		<button id="result">Result</button>
		<span id="score">0</span>
	</div>
	
	<!-- Script is run that tracks a clickable counter. The number of clicks is passed to the 
			MySQL database upon which if the user logs out and then back in number of clicks is not reset. The idea
			will be to do the same with course and quiz progress	
	-->
	<script type="text/javascript" >
	  	var button = document.getElementById("clickme"),
	  	count = 0;
		button.onclick = function()
		{
	 	 count += 1;
	 	 document.getElementById("counted").innerHTML = count;
		};
		
			//Multiple values to be passed to PHP Insert Into using AJAX call
	 $("#result").click(function(){
	 	var counter = count;
	    $.ajax({
	    	url: "lesson_scores.php",
	    	type: 'post',
	      data: {counted : counter}, 
	      success:function(result){
	      $('#score').html(result);
	      }});
	   
	  });
	</script>
	  
<?php
	include("footer.php");
?>




