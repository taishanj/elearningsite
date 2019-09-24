<?php
	include("db/wa_db_connection.php");
	session_start();
	$category = 1;
	$subject_name = "Spanish";
	$res= $conn->prepare("select QUEST_name,QUEST_answer1,QUEST_answer2,Quest_answer3,Quest_answer4
								 from Questions where QUEST_module_num= '$category' AND QUEST_subject='$subject_name'");//have i changed var names?
	 	$res->execute();
	$rows = $res->rowCount();
	$i=1;
	$result = $res->fetch(PDO::FETCH_ASSOC);

	foreach($result as $row){
		echo "<p> " . $row. "</p><br>";
	}
?>