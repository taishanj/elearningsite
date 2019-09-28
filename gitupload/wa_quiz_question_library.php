<?php
//CANT BE DONE WITHOUT USING ARRAYS OR OTHER METHODS FROM PHP
require("wa_db_connection.php");
try {

    // begin the transaction
    $conn->beginTransaction();
	
	$conn->exec("INSERT INTO Questions (QUEST_what_question_number, QUEST_what_course, QUEST_what_module, QUEST_what_coursename, QUEST_name, QUEST_answer1, QUEST_answer2, QUEST_answer3, QUEST_answer4, QUEST_correct_answer) VALUES
			(1,1,1,'Spanish','What is the correct way to say I am walking ?', 'yo camino','tu caminas', 'ellos caminen', 'tú camines', '2'),
			(2,1,1,'Spanish','If someone asked -- ¿tú fumas? --they are asking?', 'Do you smoke?', 'Does he smoke?', 'Does she smoke?', 'Do they smoke', '1'),
			(3,1,1,'Spanish','How would you say  --He lives i.n Colombia?-- ?', 'nosotros vivimos en Colombia', 'Ud vive en Colombia', 'él vive en Colombia', 'yo vivo en Colombia', '3'),
			(4,1,1,'Spanish','How would you ask an airport official --Do you speak English?--?', '¿Tú hablas el inglés?', '¿Hablos tú  el inglés?', '¿Ud. hablan el inglés?', '¿Ud. habla el inglés?', '4'),
			(5,1,1,'Spanish','What is the third person plural of the verb  --leer – to read--?', 'yo leo', 'Uds. leen', 'Ud. lee', 'Ellas leen', '4'),

			(1,1,2,'Spanish','What is the correct way to say --Im coming back just now--  --volver-to retun--?', 'ya volvemos', 'ya vuelo', 'ya vuelven', 'ya vuelvo', '4'),
			(2,1,2,'Spanish', 'How would you ask a waiter --What do you recommend ?--?', '¿Qué recomiendas?', '¿Qué recomendas?', '¿Qué recomienda Ud.?', '¿Qué recomendeis?', '3'),
			(3,1,2,'Spanish', 'How would you ask whether five new classmates play basketball?', '¿Uds juegen al baloncesto?', '¿Uds jugan al baloncesto?', '¿Jugas tú al baloncesto?', '¿Ud. juege al baloncesto?', '1'),
			(4,1,2,'Spanish','Which of these verbs is a Present Tense Stem Changer', 'bailar', 'perder', 'ver', 'marcar','2'),
			(5,1,2,'Spanish', 'How would you express your opinion using the verb --pensar-to think-?', 'Ud. pienso...', 'Tú piensas', 'Yo penso', 'Yo pienso', '4')");
    // commit the transaction
    $conn->commit();
    echo "New questions created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>




