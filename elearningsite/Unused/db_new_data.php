<?php
/*An example of how data can be input via admin user into the database
	database connection made via connection.php */
require("connection.php");

try {

    $sql = "INSERT INTO MyGuests (firstname, lastname, email,clickCount)
    VALUES ('John', 'Doe', 'john@example.com','1')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>