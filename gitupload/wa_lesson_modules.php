<?php
//CANT BE DONE WITHOUT USING ARRAYS OR OTHER METHODS FROM PHP
require("wa_db_connection.php");
try {
   $conn->beginTransaction();
	$conn->exec("INSERT INTO Topics(Topic_module_num, SUBJECT_id,TOPIC_module_name, TOPIC_name) VALUES
			(1,'1','Present Tense', 'Greetings (Saludos)'),
			(2,'1','Present Tense', 'Regular Verbs'),
			(3,'1','Present Tense','Stem Changers'),
			(4,'1','Present Tense','Irregular Verbs'),
			(5,'1','Present Tense','Ser & Estar (To Be)'),
			(6,'1','Present Tense','Myself (Yo)'),
			(7,'1','Present Tense','My Family  (Mi Familia)'),
			(8,'1','Present Tense','Exam (Examen)'),
			
			(1,'2','Present Tense', 'Greetings / Salutations'),
			(2,'2','Present Tense', 'ER verbs'),
			(3,'2','Present Tense', 'IR verbs'),
			(4,'2','Present Tense', 'RE verbs'),
			(5,'2','Present Tense', 'Irregular Verbs'),
			(6,'2','Present Tense', 'Myself (Moi)'),
			(7,'2','Present Tense', 'My Family (Ma Famille)'),
			(8,'2','Present Tense','Exam (Examen)')");
    $conn->commit();
    echo "Lesson Modules added successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>




