	<?php
	include("header.php");
	require("db/wa_db_connection.php");
	session_start();
	if ( isset( $_SESSION['id'] ) ){require_once("logged_in_header.php");}else	{header("Location: wa_register_new_user.php");}
	?>
		<div style="height: 100px;">
			<h4><?php echo "Welcome to your " . ucfirst($_SESSION['COURSE_name']) . " lessons: " . ucfirst($_SESSION['name']) . ".<br>";?></h4>
		</div>
		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Topics</span>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
         <a href="#">About</a>
         <a href="#">Services</a>
         <a href="#">Clients</a>
         <a href="#">Contact</a>
	   </div>
	   
	   <div align="center">
		   <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLqPENa8iy0CxwHk60OGKzkbfezmf-EG-F"
		   frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	   </div>
	   <div style="text-align:center;" class="progress">
		   <h3>Click Counter</h3>
	      <button id="clickme">Click me </button>
	      <span style="background:grey;" id="counted">0</span>
	   </div>
	   <div style="text-align:center;">
		   <button id="result">Result</button>
		   <span style="background:orange;"id="score">0</span>
	   </div>
   <script src="js/lesson_js.js" type="text/javascript">	</script>
<?php
	include("footer.php");
?>
	
	
	
	
