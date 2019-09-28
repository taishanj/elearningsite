<?php
include("wa_db_connection.php");

try {

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('Spanish', 'Travel to Madrid', 'Pablo Picasso', 'imgs/spanish.jpg','www.facebook.com')");
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('French', 'Travel to Paris', 'Dieudonne', 'imgs/french.jpg','www.facebook.com')");
    /*
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('Chinese', 'Travel to Beijing', 'MaLin', 'imgs/chinese.jpg','www.facebook.com')");
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('German', 'Travel to Deutschland', 'Angela Merkel', 'imgs/german.jpg','www.facebook.com')");
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('Igbo', 'Travel to Nigeria', 'Chinua Achebe', 'imgs/igbo.jpg','www.facebook.com')");
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('Ahmaric', 'Travel to Ethiopia', 'Selassie', 'imgs/ahmaric.jpg','www.facebook.com')");
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('Portuguese', 'Travel to Portugal', 'Cristiano', 'imgs/portuguese.jpg','www.facebook.com')");
    $conn->exec("INSERT INTO Courses(COURSE_name, COURSE_desc, COURSE_tutor, COURSE_image,COURSE_url) 
    VALUES ('Hebrew', 'Travel To Israel', 'Chomsky', 'imgs/hebrew.jpg','www.facebook.com')");
    */


    // commit the transaction
    $conn->commit();
    echo "Course Display Information Loaded Successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>