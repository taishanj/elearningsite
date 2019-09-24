<!-- Online Web Academy Website/Template
	  Project Start Date: August 1st 2019
	  Developer: R. Jones
-->
	<!DOCTYPE html>
	<html>
	<title>Online Academy Template</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/index.css">
		<body>
			<!-- Navbar (sit on top) -->
			<div class="w3-top">
			  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
			     <a href="#home" class="w3-bar-item w3-button"><b>Étoile</b> Academy</a>
			     <!-- Float links to the right. Hide them on small screens -->
		     <div class="w3-right w3-hide-small">
			     <a href="register_form.php" class="w3-bar-item w3-button">Sign Up</a>
			     <a href="wa_login_form.php" class="w3-bar-item w3-button">Login</a>
			     <a href="wa_user_dashboard.php" class="w3-bar-item w3-button">My Courses</a>
			     <a href="course_menu.php" class="w3-bar-item w3-button">Library</a>
			     <a href="eval.php" class="w3-bar-item w3-button">Quiz</a> 
			  </div>
			  </div>
			</div>

			<!-- Header -->
			<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
				<img class="w3-image" src="imgs/collaboration.jpg" alt="Architecture" width="1500" height="800">
				<div class="w3-display-middle w3-margin-top w3-center">
				   <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>HEKIMA</b></span> <span class="w3-hide-small w3-text-light-grey">Academy</span></h1>
			   </div>
			</header>

			<!-- Page content -->
			<!--<div class="w3-content w3-padding" style="max-width:1564px">-->
			<!--Courses available-->
		   <?php include("wa_course_menu.php");?>
 
			<!-- About Section -->
			<div class="w3-container w3-padding-32" id="about">
				<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
				<p>Étoile is the French word for stars. This project is designed for persons througouht Trinidad and Tobago 
					and the Caribbean who have the ambition to reach for the stars through personal development and learning. 
					As our project grows we hope to act as a platform for educators throughout the region to hone their skills
					and to capture the minds and hearts of future generations. We invite you to learn with us and to 'Visez Les Étoiles'! 
				</p>
			</div>

			<div class="w3-row-padding w3-grayscale">
				<div class="w3-col l3 m6 w3-margin-bottom">
					<img src="imgs/ceoprofile.jpg" alt="John" style="width:100%">
					<h3>John Doe</h3>
					<p class="w3-opacity">CEO & Founder</p>
					<p>Educator and Software Developer with over 10 years experience.</p>
					<p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
				</div>
				<div class="w3-col l3 m6 w3-margin-bottom">
				<img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
            <h3>Jane Doe</h3>
            <p class="w3-opacity">Architect</p>
            <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
            <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
         </div>

         <!-- Contact Section -->
			<div class="w3-container w3-padding-32" id="contact">
				<h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
            <p>Lets get in touch and talk about your next project.</p>
            <form action="email_processing.php" method="POST">
					<input class="w3-input w3-border" type="text" placeholder="Name" required name="name">
               <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="email">
               <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="subject">
               <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="comment">
               <button class="w3-button w3-black w3-section" type="submit">
               <i class="fa fa-paper-plane"></i> SEND MESSAGE
               </button>
            </form>
          </div>
  
			<!-- Image of location/map -->
			<div class="w3-container">
				<img src="/w3images/map.jpg" class="w3-image" style="width:100%">
         </div>
         <!-- End page content -->
			</div>

			<!-- Footer -->
			<footer class="w3-center w3-black w3-padding-16">
				<p>Powered by <a href="www.raphaeljdev.com" title="W3.CSS" target="_blank" class="w3-hover-text-green">raphaeljdev.com</a></p>
         </footer>

		</body>
	</html>
	