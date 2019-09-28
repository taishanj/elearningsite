<?php
	require("db/wa_db_connection.php");
	session_start();
	if ( isset( $_SESSION['id'] ) ){require_once("logged_in_header.php");}else	{header("Location: wa_register_new_user.php");}
?>
	<body>
      <div class="w3-container w3-padding-32" id="projects">
	      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Courses</h3>
	      <h4><?php echo "Welcome to your dashboard " . ucfirst($_SESSION['name']) . ".<br>";?></h4>
	      <h4><?php echo "Your clicks are " . $_SESSION['clickCount'] . ".<br>";?></h4>
      </div> 
   <?php
		$query_enrolled_courses = $conn->prepare("SELECT USER_coursename FROM Users WHERE USER_unique_id = ?");//??
	   $query_enrolled_courses->execute([$_SESSION['id']]);
		   if($query_enrolled_courses)
			{
				$enrolled_courses = $query_enrolled_courses->fetchAll(PDO::FETCH_COLUMN);
				foreach($enrolled_courses as $row)
				{
				   echo "<div class=mycourses><a href=lesson_load_test.php><h2>" . $row. "</h2></a></div>";
				   $_SESSION['course_chosen']=$row;
				}
			}
			
	   $query_enrolled_course_id = $conn->prepare("SELECT USER_course_chosen_id FROM Users WHERE USER_unique_id = ?");
	   $query_enrolled_course_id->execute([$_SESSION['id']]);
		$enrolled_course_id = $query_enrolled_course_id->fetch(PDO::FETCH_NUM);
		$_SESSION['course_number'] = $enrolled_course_id;
	?> 
   </body>
<?php 
	include("footer.php");
?>
