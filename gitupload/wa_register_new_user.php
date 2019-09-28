<?php 
	include ("header.php");
?>
	<body>
		<form action="wa_create_user.php" method="POST">
		   <div class="container">
		      <h1>Register</h1>
	         <p>Please fill in this form to create an account.</p>   
	         <hr>
		      <label for="firstname"><b>Firstname</b></label>
	         <input type="text" placeholder="Enter Firstname" name="firstname" required>
	         <label for="email"><b>Email</b></label>
	         <input type="text" placeholder="Enter Email" name="email" required>
	         <label for="pwd"><b>Password</b></label>
	         <input type="password" placeholder="Enter Password" name="pwd" required>
	         <label for="pwd-repeat"><b>Repeat Password</b></label>
	         <input type="password" placeholder="Repeat Password" name="pwd-repeat" required>
	         <hr>
	         <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
	         <button type="submit" class="registerbtn">Register</button>
	      </div>
	      <div class="container signin">
		      <p>Already have an account? <a href="wa_login_form.php">Log In</a>.</p>
	      </div>
	   </form>
	</body>
</html>
