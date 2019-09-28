<?php
	require("wa_db_connection.php");
	
	try 
	{
$guests =    "CREATE TABLE IF NOT EXISTS MyGuests(
			    STU_id INT(6) AUTO_INCREMENT NOT NULL, 
			    STU_firstname VARCHAR(30) NOT NULL,
			    STU_lastname VARCHAR(30) NOT NULL,
			    STU_email VARCHAR(50) NOT NULL,
			    STU_password VARCHAR(128) NOT NULL, 
			    STU_clickCount INT NOT NULL DEFAULT 0,
			    PRIMARY KEY(STU_id)
			    )ENGINE=InnoDB";
	   
$users =     "CREATE TABLE IF NOT EXISTS Users(
			    USER_num INT AUTO_INCREMENT NOT NULL,
			    USER_id INT,
			    USER_course_chosen INT NOT NULL,
			    USER_percent_completed INT NOT NULL,
			    USER_coursename VARCHAR (100) NOT NULL,
			    USER_name VARCHAR (100) NOT NULL,
			    PRIMARY KEY (USER_num),
			    FOREIGN KEY(USER_id) REFERENCES MyGuests(STU_id)
				 )ENGINE=InnoDB AUTO_INCREMENT=3;"; //Engine=InnoDB + latin1
		
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
			   TOPIC_module_num INT NOT NULL,
			   SUBJECT_id INT,
			   TOPIC_module_name VARCHAR (100) NOT NULL,
			   TOPIC_name varchar(100) NOT NULL,
			   PRIMARY KEY (TOPIC_module_num),
			   FOREIGN KEY(SUBJECT_id) REFERENCES Courses(COURSE_id)
				)ENGINE=InnoDB AUTO_INCREMENT=5;";//Engine=InnoDB + latin1 + auto_increment 5
			
	
	//How to share $topics topic_module with id below?
$quests=    "CREATE TABLE IF NOT EXISTS Questions (
			   QUEST_id int(11) NOT NULL AUTO_INCREMENT,
			   QUEST_module_num INT,
			   QUEST_subject VARCHAR (50),
			   QUEST_name text NOT NULL,
			   QUEST_answer1 varchar(250) NOT NULL,
			   QUEST_answer2 varchar(250) NOT NULL,
			   QUEST_answer3 varchar(250) NOT NULL,
			   QUEST_answer4 varchar(250) NOT NULL,
			   QUEST_correct_answer varchar(250) NOT NULL,
			   PRIMARY KEY (QUEST_id),
			   FOREIGN KEY(QUEST_module_num) REFERENCES Topics(TOPIC_module_num)
			   )ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=11;" ;//Engine=InnoDB //INCREMENT 11 because there are 10 questions
	
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