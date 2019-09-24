	<?php
	include("header.php");
	require("db/wa_db_connection.php");
	session_start();
	if ( isset( $_SESSION['id'] ) ){require_once("logged_in_header.php");}else	{header("Location: wa_register_new_user.php");}
	$course_chosen = $username = $course_choice = '';
	$course_chosen = $_SESSION['course_chosen'];
	$username = $_SESSION['name'];
   $course_choice = $_SESSION['COURSE_id'];
	?>
		<!--
		<div style="height: 100px;">-->
			<h4><?php echo "<br><br><br><br>  Welcome to your " . ucfirst($course_chosen). " lessons:  " . ucfirst($_SESSION['name']) . ".<br>";?></h4>			
		</div>
		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Topics</span>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
			<?
				$course_module_query = $conn->prepare("SELECT TOPIC_name FROM Topics WHERE SUBJECT_id=?");//more efficient way?
				$course_module_query->execute([$course_choice]);
				$topics = $course_module_query->fetchAll(PDO::FETCH_COLUMN);
				if($course_module_query)
				{
					foreach($topics as $row){
						echo "<a href=wa_quiz_practice.php>" . $row . "</a>";
					}
				}
		  	?>	
	   </div>
	   <div align="center">
		   <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLqPENa8iy0CxwHk60OGKzkbfezmf-EG-F"
		   frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	   </div>
	   <div style="text-align:center;" class="progress">
		   <h3>Click Counter</h3>
	      <button id="clickme">Click me </button>
	   </div>
	   <div>
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
	
	
	
	
