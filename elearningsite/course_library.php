<?php
//Not to be shared on Git (Aspects of the site that reveal precisely desired functionality or db structure excluded)
//Populate database elearn -> table -> Courses with 8 example courses (Spanish, French, Chinese)
include("connection.php");

	try {
	
	    // begin the transaction
	    $conn->beginTransaction();
	    // our SQL statements
	    $conn->exec("INSERT INTO Courses(coursename, coursedesc,coursetutor,courseimg,courseURL) 
	    VALUES ('Spanish', 'Travel to Madrid', 'Pablo Picasso', 'spanish.jpg','www.facebook.com')");
	    $conn->exec("INSERT INTO Courses (coursename, coursedesc,coursetutor,courseimg,courseURL ) 
	    VALUES ('French', 'Travel to Paris', 'Dieudonne', 'french.jpg','www.facebook.com')");
	    $conn->exec("INSERT INTO Courses(coursename, coursedesc,coursetutor,courseimg,courseURL) 
	    VALUES ('Chinese', 'Travel to Beijing', 'MaLin', 'chinese.jpg','www.facebook.com')");
	    $conn->exec("INSERT INTO Courses (coursename, coursedesc,coursetutor,courseimg,courseURL) 
	    VALUES ('German', 'Travel to Spain', 'Angela Merkel', 'german.jpg','www.facebook.com')");
	    $conn->exec("INSERT INTO Courses(coursename, coursedesc,coursetutor,courseimg,courseURL) 
	    VALUES ('Igbo', 'Travel to Nigeria', 'Chinua Achebe', 'igbo.jpg','www.facebook.com')");
	    $conn->exec("INSERT INTO Courses (coursename, coursedesc,coursetutor,courseimg,courseURL ) 
	    VALUES ('Ahmaric', 'Travel to Ethiopia', 'Selassie', 'ahmaric.jpg','www.facebook.com')");
	    $conn->exec("INSERT INTO Courses(coursename, coursedesc,coursetutor,courseimg,courseURL) 
	    VALUES ('Portuguese', 'Travel to Portugal', 'Cristiano', 'portuguese.jpg','www.facebook.com')");
	    $conn->exec("INSERT INTO Courses (coursename, coursedesc,coursetutor,courseimg,courseURL) 
	    VALUES ('Hebrew', 'Israel', 'Chomsky', 'hebrew.jpg','www.facebook.com')");
	
	
	    // commit the transaction
	    $conn->commit();
	    echo "New records created successfully";
	    }
	catch(PDOException $e)
	    {
	    // roll back the transaction if something failed
	    $conn->rollback();
	    echo "Error: " . $e->getMessage();
	    }
	    
    //end database connection
	$conn = null;
?>