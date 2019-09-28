<?php
	require("wa_db_connection.php");
	try 
	{
$guests =    "CREATE TABLE IF NOT EXISTS MyGuests(
			    STU_id INT(6) AUTO_INCREMENT NOT NULL, 
			    STU_firstname VARCHAR(30) NOT NULL,
			    STU_email VARCHAR(50) NOT NULL,
			    STU_password VARCHAR(128) NOT NULL, 
			    STU_clickCount INT NOT NULL DEFAULT 0,
			    PRIMARY KEY(STU_id)
			    )ENGINE=InnoDB";
	   
$users =     "CREATE TABLE IF NOT EXISTS Users(
			    USER_total_count INT AUTO_INCREMENT NOT NULL,
			    USER_firstname VARCHAR (100) NOT NULL,
			    USER_unique_id INT,
			    USER_course_chosen_id INT NOT NULL,
			    USER_coursename VARCHAR (100) NOT NULL,
			    USER_module1 INT NOT NULL,
			    USER_module1_score DECIMAL(5,2) NOT NULL CHECK(USER_module1_score >=0 and USER_module1_score <=100),
			    USER_module2 INT NOT NULL,
			    USER_module2_score DECIMAL(5,2) NOT NULL CHECK(USER_module2_score >=0 and USER_module2_score <=100),
			    USER_percent_completed INT NOT NULL,
			    PRIMARY KEY (USER_total_count),
			    FOREIGN KEY(USER_unique_id) REFERENCES MyGuests(STU_id) 
				 )ENGINE=InnoDB"; //Engine=InnoDB + latin1
		
$courses =   "CREATE TABLE IF NOT EXISTS Courses(
			    COURSE_id INT AUTO_INCREMENT NOT NULL,
			    COURSE_name VARCHAR(30) NOT NULL,
			    COURSE_desc VARCHAR(200) NOT NULL,
			    COURSE_tutor VARCHAR(50) NOT NULL,
			    COURSE_image VARCHAR(50) NOT NULL,
			    COURSE_url VARCHAR (100) NOT NULL, 
			    PRIMARY KEY (COURSE_id)
			    )ENGINE=InnoDB";   
    
$topics =   "CREATE TABLE IF NOT EXISTS Topics (
				TOPIC_total_count INT NOT NULL AUTO_INCREMENT,
			   TOPIC_module_num INT NOT NULL,
			   SUBJECT_id INT,
			   TOPIC_module_name VARCHAR (100) NOT NULL,
			   TOPIC_name VARCHAR (100) NOT NULL,
			   PRIMARY KEY (TOPIC_total_count),
			   FOREIGN KEY(SUBJECT_id) REFERENCES Courses(COURSE_id)
				)ENGINE=InnoDB";
			
$quests=    "CREATE TABLE IF NOT EXISTS Questions (
			   QUEST_total_count int(11) NOT NULL AUTO_INCREMENT,
			   QUEST_what_question_number INT NOT NULL,
			   QUEST_what_course INT NOT NULL,
			   QUEST_what_module INT NOT NULL,
			   QUEST_what_coursename VARCHAR (50),
			   QUEST_name TEXT NOT NULL,
			   QUEST_answer1 varchar(250) NOT NULL,
			   QUEST_answer2 varchar(250) NOT NULL,
			   QUEST_answer3 varchar(250) NOT NULL,
			   QUEST_answer4 varchar(250) NOT NULL,
			   QUEST_correct_answer varchar(250) NOT NULL,
			   PRIMARY KEY (QUEST_total_count),
			   FOREIGN KEY(QUEST_what_course) REFERENCES Courses(COURSE_id)
			   )ENGINE=InnoDB DEFAULT CHARSET=utf8" ;
	
			   $conn->exec($guests);
			   print "Table Myguests created successfully";
			   $conn->exec($users);
			   print "Table Users created successfully";
			   $conn->exec($courses);
			   print "Table Courses created successfully";
				$conn->exec($topics);
				print "Table Topics created successfully";
				$conn->exec($quests);
				print"Table Questions created successfully";
	}
	catch(PDOException $e)
   {
	   echo $guests . "<br>" . $e->getMessage();
	   echo "\r\n";
	   echo $guests . "<br>" . $e->getMessage();
	   echo "\r\n";
	   echo $guests . "<br>" . $e->getMessage();
	   echo "\r\n";
      echo $guests . "<br>" . $e->getMessage();
   }
	$conn = null;
?>