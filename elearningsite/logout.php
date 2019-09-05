<?php
session_start();
if ( isset( $_SESSION['id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
	require_once("logged_in_header.php");
} else {
    // Redirect them to the login page
    header("Location: register_form.php");
}

?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
header("location: index.php");
?>

</body>
</html>