	<!---
	  Original Code: https://smarttutorials.net/responsive-quiz-application-using-php-mysql-jquery-ajax-and-twitter-bootstrap/
	--->
	<?php
	session_start();
	require("db/wa_db_connection.php");
	if ( isset( $_SESSION['id'] ) ){require_once("logged_in_header.php");}else	{header("Location: wa_register_new_user.php");}
	?>

	<?php 

	if(!empty($_SESSION['name'])){
	
	    $right_answer=0;
	    $wrong_answer=0;
	    $unanswered=0; 
	
	   $keys=array_keys($_POST);
	   $order=join(",",$keys);//What?
		//Can I randomize questions
	   $response=$conn->prepare("select QUEST_id,QUEST_correct_answer from Questions where QUEST_id  ORDER BY QUEST_id");
	   $response->execute();
	   while($result = $response->fetch())
	   {
	  	  if($result['QUEST_correct_answer']== $_POST[$result['QUEST_id']])
	       {
	               $right_answer++;
	           }else if($_POST[$result['QUEST_id']]==5)
	           {
	               $unanswered++;
	           }
	           else
	           {
	               $wrong_answer++;
	           }
	   }
	   $name=$_SESSION['name'];  
	   $score_update = "update Users set USER_percent_completed='$right_answer' where USER_name='$name'";
	   $sql = $conn->prepare($score_update);
	   $sql->execute();
	?>
	        <!-- Bootstrap -->
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	        <link href="eval_style_quiz.css" rel="stylesheet" media="screen">
	    </head>
	    <body>
	        <header>
	            <p class="text-center">
	                Welcome <?php 
	                if(!empty($name)){
	                    echo ucfirst($name);
	                }?>
	            </p>
	        </header>
	        <div class="container result">
	            <div class="row"> 
	                    <div class='result-logo'>
	                            <img src="image/Quiz_result.png" class="img-responsive"/>
	                    </div>    
	           </div>  
	           <hr>   
	           <div class="row"> 
	                  <div class="col-xs-18 col-sm-9 col-lg-9"> 
	                    <div class='result-logo1'>
	                            <!--<img src="cat.gif" class="img-responsive"/>-->
	                    </div>
	                  </div>
	
	                  <div class="col-xs-6 col-sm-3 col-lg-3"> 
	                     <a href="<?php echo BASE_PATH;?>" class='btn btn-success'>Start new Quiz!!!</a>                   
	                     <a href="<?php echo BASE_PATH;?>" class='btn btn-success'>Logout</a>
	
	                       <div style="margin-top: 30%">
	                        <p>Total no. of right answers : <span class="answer"><?php echo $right_answer;?></span></p>
	                        <p>Total no. of wrong answers : <span class="answer"><?php echo $wrong_answer;?></span></p>
	                        <p>Total no. of Unanswered Questions : <span class="answer"><?php echo $unanswered;?></span></p>                   
	                       </div> 
	
	                   </div>
	
	            </div>    
	            <div class="row">    
	
	            </div>
	        </div>
	        <footer>
	            <p class="text-center" id="foot">
	                &copy; <a href="http://smarttutorials.net/" target="_blank">Smart Tutorials </a>2013
	            </p>
	        </footer>
	        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	        <script src="js/jquery-1.10.2.min.js"></script>
	        <script src="js/bootstrap.min.js"></script>
	
	        <!-- Include all compiled plugins (below), or include individual files as needed -->
	        <script src="js/jquery.validate.min.js"></script>
	
	    </body>
	</html>
	<?php 
		}
		else
		{
		 //header( 'Location: wa_quiz_practice.php' ) ;
		}
	?>