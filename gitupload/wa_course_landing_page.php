<?php
	require("db/wa_db_connection.php");
	require_once("header.php");
	session_start();
?>
<?php
		$course_library_item_choice = $_SESSION['course_library_choice'];
		$query_courses_display_images = $conn->prepare("SELECT * FROM Courses WHERE COURSE_image = ?");
		$query_courses_display_images->execute([$course_library_item_choice]);
		$library_selection = $query_courses_display_images->fetch();
		//If course chosen exists
		if($library_selection)
		{
			$_SESSION['COURSE_name'] = $library_selection['COURSE_name'];
    		$_SESSION['COURSE_desc'] = $library_selection['COURSE_desc'];
    		$_SESSION['COURSE_tutor'] = $library_selection['COURSE_tutor'];
    		$_SESSION['COURSE_image'] = $library_selection['COURSE_image'];
    		$_SESSION['COURSE_id'] = $library_selection['COURSE_id'];
    	}
?>
		<div class="w3-row-padding w3-grayscale">
			<div class="w3-col l3 m6 w3-margin-bottom">
	     	   <img src="<?php echo $_SESSION['COURSE_image'];?>" alt="John" style="width:100%">
            <h3><?php echo $_SESSION['COURSE_name'];?></h3>
            <p class="w3-opacity"><?php echo $_SESSION['COURSE_tutor'];?></p>
            <p><?php echo $_SESSION['COURSE_desc'];?></p>
            <p><button class="w3-button w3-light-grey w3-block" id="redirectUser">Enroll</button></p>

        </div>
      </div>
      <script>
	      document.getElementById("redirectUser").onclick = function () 
	      {
         location.href = "wa_course_payment.php";
       	};
		</script>
<?php
	include("footer.php");
?>
