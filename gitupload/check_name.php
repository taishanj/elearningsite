<?php
/*
 * Original code: https://smarttutorials.net/responsive-quiz-application-using-php-mysql-jquery-ajax-and-twitter-bootstrap/
 * 
 */
 require_once 'db/wa_db_connection';
	 $username = '';
	 $username = $_SESSION['name'];
	 if(!empty($username)){
	     //$name=$_POST['name'];
	     $res=$conn->prepare("select count(user_name) as count from users where user_name='$username'"); 
	     $res->execute([$username]);
	     $user= $res->fetch();
	     if($user){//testing ! to 
	         echo 'true';
	     }else{
	         echo 'false';
	     }
	 }
?>

