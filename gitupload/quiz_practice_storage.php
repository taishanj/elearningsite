<?php
	session_start();
?>
	<!---
	 Original Code: https://smarttutorials.net/responsive-quiz-application-using-php-mysql-jquery-ajax-and-twitter-bootstrap/
	--->

<?php
	require("db/wa_db_connection.php");
	require_once("header.php");
?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Responsive Quiz Application Using PHP, MySQL, jQuery, Ajax and Twitter Bootstrap</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- Bootstrap -->
			<!--<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">-->
			<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
			<!--
			<!-- Latest compiled and minified CSS (Sept 14 2019)
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<!-- jQuery library 
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<!-- Popper JS 
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
			<!-- Latest compiled JavaScript 
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>		
			<link href="eval_quiz_style.css" rel="stylesheet" media="screen">
	</head> -->
		<body>
			<header>
				<p class="text-center">
					Welcome <?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}?>
				</p>
			</header>
			
		<div class="container">
			<div class="row">
				<div class="col-xs-14 col-sm-7 col-lg-7">
					<div class='image'>
						<!--<img src="image/logo.png" class="img-responsive"/>-->
					</div>
				</div>
				<div class="col-xs-10 col-sm-5 col-lg-5">
					<div class="intro">
						<p class="text-center">
							Please enter your name
						</p>
						<?php if(empty($_SESSION['name'])){?>
						<form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
							<div class="form-group">
								<input type="text" id='name' name='name' class="form-control" placeholder="Enter your Name"/>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
							    <select class="form-control" name="category" id="category">
							        <option value="">Choose your category</option>
                                  <option value="1">Present Tense I</option>
                                  <option value="2">Present Tense II</option>
                                  <option value="3">PHP</option>
                                  <option value="4">CSS</option>                                
                                </select>
                                <span class="help-block"></span>
							</div>

							<br>
							<button class="btn btn-success btn-block" type="submit">
								Submit!!!
							</button>
						</form>

						<?php }else{?>
						    <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
                            <div class="form-group">
                                <select class="form-control" name="category" id="category">
                                    <option value="">Choose your category</option>
                                  <option value="1">Present Tense I</option>
                                  <option value="2">Present Tense II</option>
                                  <option value="3">PHP</option>
                                  <option value="4">CSS</option>                                  
                                </select>
                                <span class="help-block"></span>
                            </div>

                            <br>
                            <button class="btn btn-success btn-block" type="submit">
                                Submit
                            </button>
                        </form>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<p class="text-center" id="foot">
				&copy; <a href="http://smarttutorials.net/" target="_blank">Smart Tutorials </a>2013
			</p>
		</footer>

		<script>
			$(document).ready(function() {
				$("#signin").validate({//doesn't work even before major edits
					submitHandler : function() {
					    console.log(form.valid());
						if (form.valid()) {
						    alert("sf");
							return true;
						} else {
							return false;
						}

					},
					rules : {
						name : {
							required : true,
							minlength : 3,
							remote : {
								url : "check_name.php",
								type : "post",
								data : {
									username : function() {
										return $("#name").val();
									}
								}
							}
						},
						category:{
						    required : true
						}
					},
					messages : {
						name : {
							required : "Please enter your name",
							remote : "Name is already taken, Please choose some other name"
						},
						category:{
                            required : "Please choose your category to start Quiz"
                        }
					},
					errorPlacement : function(error, element) {
						$(element).closest('.form-group').find('.help-block').html(error.html());
					},
					highlight : function(element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success : function(element, lab) {
						var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");
						var num = Math.floor(Math.random() * 6);
						$(lab).closest('.form-group').find('.help-block').text(messages[num]);
						$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			});
		</script>

	</body>
</html>