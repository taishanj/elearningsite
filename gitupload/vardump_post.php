<?php
	session_start();
	require("db/wa_db_connection.php");
?>
<form class="form-horizontal" role="form" id='login' method="post" action="vardump.php">
						<?php 
		               $res= $conn->prepare("select * from Questions where QUEST_module_num= '1'");//have i changed var names?
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
		               <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['QUEST_name'];?></p>
	                  <input type="radio" value="1" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer1'];var_dump($result['QUEST_id']);?>
	                  <br/>
	                  <input type="radio" value="2" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer2']; var_dump($result['QUEST_id']);?>
	                  <br/>
	                  <input type="radio" value="3" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer3']; var_dump($result['QUEST_id']);?>
	                  <br/>
	                  <input type="radio" value="4" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo $result['QUEST_answer4']; var_dump($result['QUEST_id']);?>
	                  <br/>
	                  <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
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
		    
	                   <input type="radio" value="1" id='radio1_<?php echo $result['QUEST_id'];?>' name='<?php echo $result['QUEST_id'];?>'/><?php echo  $result['QUEST_answer1'];?>
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