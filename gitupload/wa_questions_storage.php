<?php
	session_start();
	require("db/wa_db_connection.php");
		if ( isset( $_SESSION['id'] ) ){require_once("logged_in_header.php");}else	{header("Location: wa_register_new_user.php");}
?>

<?php 
	   $subject_name = $module= $username = '';
	   $username=$_SESSION['name'];
		$module=$_POST['module_num'];
	   //$subject_name=$_SESSION['subject_chosen'];//??? How to set session variable to correct subject (lesson load page?)
		try
		{		
			if(!empty($username))
			{
		    	$conn->beginTransaction();
		      $conn->exec("INSERT INTO Users (USER_name,USER_percent_completed,USER_course_chosen) VALUES ('$username',0,'$module')"); //'NULL'
				$_SESSION['name']= $username;
		    	$conn->commit();
			   $conn->lastInsertId();
		   }	
		   if(!empty($username))
		   { 
?>
	   <header>
		   <p class="text-center">
	      Welcome : <?php if(!empty($username)){echo ucfirst($username);}?>
	      </p>
	   </header>
			<div class="container question">
				<div class="col-xs-12 col-sm-8 col-md-8 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
					<p>
						Responsive Quiz Application Using PHP, MySQL, jQuery, Ajax and Twitter Bootstrap
					</p>
					<hr>
					<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
						<?php 
		               $res= $conn->prepare("select * from Questions where QUEST_module_num= '$module'");//have i changed var names?
	                	$res->execute();
	                  $rows = $res->rowCount();
							$i=1;
							while($result = $res->fetch()){
								//echo "Here it is " . $result['QUEST_id'];
	               ?>
	               <?php 
	               
		               if($i==1)
		               {
	               ?>       
		            <div id='question<?php echo $i;?>' class='cont'>
		               <p class='questions' id="qname<?php echo $i;?>"> <?php //echo $i?>.<?php echo $result['QUEST_name'];?></p>
		                <input type="radio" value="1" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer1'];?>
	                  <br/>
	                  <input type="radio" value="2" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer2'];?>
	                  <br/>
	                  <input type="radio" value="3" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer3'];?>
	                  <br/>
	                  <input type="radio" value="4" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer4'];?>
	                  <br/>
	                  <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/>                                                                      
	                  <br/>
	                  <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
	                
	               </div>     
	               <?php 
		               }
		               elseif($i<1 || $i<$rows)
		               {
	               ?>
		            <div id='question<?php echo $i;?>' class='cont'>
		               <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['QUEST_name'];?></p>
		    
	                   <input type="radio" value="1" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo  $result['QUEST_id'];/*$result['QUEST_answer1'];*/?>
	                  <br/>
	                  <input type="radio" value="2" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_id'];/*$result['QUEST_answer1'];*/?>
	                  <br/>
	                  <input type="radio" value="3" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_id'];/*$result['QUEST_answer1'];*/?>
	                  <br/>
	                  <input type="radio" value="4" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_id'];/*$result['QUEST_answer1'];*/?>
	                  <br/>
	                  <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/>                                                                    
	                  <br/>
	                  <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
	            
	               </div>
	               <?php
		               }
		               elseif($i==$rows)
		               {
	               ?>
	               <div id='question<?php echo $i;?>' class='cont'>
	                 <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['QUEST_name'];?></p>
	                
	                 <input type="radio" value="1" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer1'];?>
	                 <br/>
	                 <input type="radio" value="2" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer2'];?>
	                 <br/>
	                 <input type="radio" value="3" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer3'];?>
	                 <br/>
	                 <input type="radio" value="4" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer4'];?>
	                 <br/>
	                 <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/>                                                                      
	                 <br/>
	                 <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
	                 <button id='next<?php echo $i;?>' class='next btn btn-success' type='submit'>Finish</button>
	                
	               </div>
						<?php 
							} 
								$i++;
							}
					   ?>
					</form>
				</div>
			</div>
		<?php
			if(isset($_POST[1]))
	      { 
		      $keys=array_keys($_POST);
		      $order=join(",",$keys);
	        $response=$conn->prepare("select QUEST_id,QUEST_correct_answer from Questions where Quest_id IN($order) ORDER BY FIELD(QUEST_id,$order)");
	        $response->execute();
	        $right_answer=0;
	        $wrong_answer=0;
	        $unanswered=0;
		     while($result=$response->fetch())
		     {
		     	echo "Called";
			     //if($result['answer']==$_POST[$result['id']])
			     if($result['QUEST_id']==$_POST[$result['QUEST_correct_answer']])
		        {
				     $right_answer++;
		        }
		        else if($_POST[$result['QUEST_id']]==5)
		        {
			        $unanswered++;
		        }
		        else
		        {
		           $wrong_answer++;
		        }
		     }
			     echo "right_answer : ". $right_answer."<br>";
			     echo "wrong_answer : ". $wrong_answer."<br>";
			     echo "unanswered : ". $unanswered."<br>";
	   }
	   ?>
				<script>
					$('.cont').addClass('hide');
					count=$('.questions').length;
				   $('#question'+1).removeClass('hide');
			
					$(document).on('click','.next',function()
					{
						element=$(this).attr('id');
					   last = parseInt(element.substr(element.length - 1));
					   nex=last+1;
					   $('#question'+last).addClass('hide');
					   $('#question'+nex).removeClass('hide');
					 });
			
					$(document).on('click','.previous',function()
					{
				      element=$(this).attr('id');
			         last = parseInt(element.substr(element.length - 1));
			         pre=last-1;
			         $('#question'+last).addClass('hide');
			         $('#question'+pre).removeClass('hide');
			      });
				</script>
			</body>
	   </html>
		<?php 
			}
			else
			{
			   header( 'Location: wa_quiz_practice.php' ) ;
		   }
		  
		}//end try
		catch(PDOException $e)
	   {
			// roll back the transaction if something failed
		   $conn->rollback();
		   echo "Error: " . $e->getMessage();
		}
		   $res=null;
			$conn = null;
			include("footer.php");
?>