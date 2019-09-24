
<?php
	include("header.php");
	include("db/wa_db_connection.php");
	session_start();
		if ( isset( $_SESSION['id'] ) ) 
		{
			require_once("logged_in_header.php");
		} 
		else 
		{
		    // Redirect them to the login page
		    require_once("header.php");
		}

?>
		<div class="w3-container w3-padding-32" id="projects">
			<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Courses</h3>
		</div>
		<?php
	   try {
			$query_course_catalogue = $conn->prepare("SELECT COURSE_name,COURSE_image,COURSE_desc FROM Courses"); 
	      $query_course_catalogue->execute();
		   $rows_of_courses = $query_course_catalogue->rowCount();
		   $coursenames = [];
		   $courseimgs = [];
		   $_SESSION['coursename'] = [];
	      for($i=0;$i < $rows_of_courses;$i++)
		   { 
				$courses_found = $query_course_catalogue->fetch(PDO::FETCH_OBJ);
	 			$coursenames[$i] = $courses_found->COURSE_name;
	 			$courseimgs[$i] = $courses_found->COURSE_image;
	 			$_SESSION['coursename'][] = $coursenames[$i];
		?>
		<div class="w3-col l3 m6 w3-margin-bottom">
			<div class="w3-display-container">
				<div class="w3-display-topleft w3-black w3-padding"><h4 id="lib"><?php echo $coursenames[$i];?></h4></div>
					<a href="wa_course_menu_search.php" >
					<img src="<?php echo $courseimgs[$i];?>" style="width:98%" class="imgs" alt="House">
      	      </a>
         </div>
      </div>
		<?php
			}		
		?>
		<script>
			$(document).ready(function(){
				$("a[target!='_blank']").click(function () {	
					var img = $(this).find(".imgs");
					var img_choice = img.attr("src");;
					$.ajax({
								url: 'wa_course_menu_search.php',
								type: 'post',
								data: { selected:img_choice}
	                  });
				});
			});
		</script>
		<?php		
		}
			catch(PDOException $e) 
			{
		      echo "Error: " . $e->getMessage();
			}
			$conn = null;
		?>




