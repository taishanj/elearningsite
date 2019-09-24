<?php
	session_start();
	require("db/wa_db_connection.php");
	//$keys=array_keys($_POST);
	   $order=join(",",$_POST);//What?
		//Can I randomize questions
		 
		  //$response=$conn->prepare("select QUEST_id,QUEST_correct_answer from Questions where QUEST_id IN('$order') ORDER BY FIELD(QUEST_id,'$order')");
	  			  //$response=$conn->prepare("select QUEST_id,QUEST_correct_answer from Questions where QUEST_id IN('$order') ORDER BY FIELD(QUEST_id,'$order')");
	  		  $response=$conn->prepare("select QUEST_id,QUEST_correct_answer from Questions where QUEST_id IN(QUEST_correct_answer)");
	   $response->execute();
	  // while($result = $response->fetch())
	  // {
	  //	if($response) {
	  //		echo "Yoooo!";
	  //		$result = $response->fetch();
	  		 while($result = $response->fetch())
	  {
	  		//print_r($result);
	  		print_r($result, $return = null);
	  		echo '<br>';
	  		//var_dump($response);
	  	}
	  echo '<br>';
	   $response=$conn->prepare("select QUEST_id,QUEST_correct_answer from Questions where QUEST_id  ORDER BY QUEST_id");
	   $response->execute();
	  // while($result = $response->fetch())
	  // {
	  //	if($response) {
	  //		echo "Yoooo!";
	  //		$result = $response->fetch();
	  		 while($result = $response->fetch())
	  {
	  	
	  		//print_r($result);
	  		print_r($result, $return = null);
	  		echo '<br>';
	  		//var_dump($response);
	  	}
	  	
	  	
if(isset($_POST[1]))
{   	
	   echo '<br>';
	   $response=$conn->prepare("select QUEST_id,QUEST_correct_answer from Questions where QUEST_id  ORDER BY QUEST_id");
	   $response->execute();
	  while($result = $response->fetch())
	  {
	  	  if($result['QUEST_correct_answer']== $_POST[$result['QUEST_id']])
		        {
				     //$right_answer++;
				     echo "You're right";
				     echo '<br>';
		        }

	  	}
}
?>