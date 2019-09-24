<?php
	session_start();
	require("db/wa_db_connection.php");
	if ( isset( $_SESSION['id'] ) ){require_once("logged_in_header.php");}else	{header("Location: wa_register_new_user.php");}
	$username = '';
	$username = $_SESSION['name'];
?>

	<header>
		<p class="text-center">
			Welcome <?php if(!empty($_SESSION['name'])){echo ucfirst($_SESSION['name']);}?>
		</p>
	</header>
			
	<div class="container">
		<div class="row">
			<div class="col-xs-14 col-sm-7 col-lg-7">
				<div class='image'>
					<img src="imgs/house2.jpg" class="img-responsive"/>
				</div>
			</div>
				<div class="col-xs-10 col-sm-5 col-lg-5">
					<div class="intro">
						<?php //if(empty($_SESSION['name'])){?>
						<!--
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
								Submit!!!
							</button>
						</form>
						-->

						<?php if(!empty($_SESSION['name'])){//}else{?>
						    <form class="form-signin" method="post" id='signin' name="signin" action="wa_questions.php">
                            <div class="form-group">
                                <select class="form-control" name="module_num" id="module_num">
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
		            module_num:{
						    required : true
						}
					},
					/*
					messages : {
						name : {
							required : "Please enter your name",
							remote : "Name is already taken, Please choose some other name"
						},
						module_num:{
                            required : "Please choose your category to start Quiz"
                        }
					},*/
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