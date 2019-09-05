<!DOCTYPE html>
<html>

<head>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta name="viewport" content="width=600">
<link rel="stylesheet" type="text/css" href="CSS/register.css">
</head>
<body>

	<form action="login_verify.php" method="POST">
  <div class="container">
    <h1>Welcome To Student's Login</h1>
    <p>Please Login Here</p>   
    <hr>
   
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <hr>

    <button type="submit" class="registerbtn">Log In</button>
  </div>

  <div class="container signin">
    <p>Wish To Create An Account? <a href="register_form.php">Sign Up Now</a>.</p>
  </div>
</form>

</body>
</html>
