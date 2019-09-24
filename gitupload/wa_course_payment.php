<?php
	require("db/wa_db_connection.php");
	include("header.php");
	session_start();
	if ( isset( $_SESSION['id']))
	{
		require_once("logged_in_header.php");
	} 
	else 
	{
	   require_once("header.php");
	}
?>
		<div class="w3-row-padding w3-grayscale">
			<div class="w3-col l3 m6 w3-margin-bottom">
	     	   <img src="<?php echo $_SESSION['COURSE_image'];?>" alt="John" style="width:100%">
            <h3 id="coursename"><?php echo $_SESSION['COURSE_name'];?></h3>
            <p class="w3-opacity"><?php echo $_SESSION['COURSE_tutor'];?></p>
            <p id="description"><?php echo $_SESSION['COURSE_desc'];?></p>
            <!--<button class="w3-button w3-light-grey w3-block">Purchase Course</button></p>-->
            <a href="wa_payment_processing.php" ><button class="w3-button w3-light-grey w3-block">Purchase Course</button></p></a>
            <!--php code indicating course price required here-->
            <a href="wa_payment_processing.php" ><p><button class="w3-button w3-light-grey w3-block">Purchase Membership</button></p></a>
            <p>Access any of your courses and practice tests for $89 TT per month</p>
        </div>
      </div>

<?php
	include("footer.php");
?>
