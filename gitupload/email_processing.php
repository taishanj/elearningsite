<?php
	require("connection.php");
		$name = $email = $subject = $comment =  "";
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$name = test_input($_POST["name"]);
	      $email = test_input($_POST["email"]);
	      $subject = test_input($_POST["subject"]);
	      $comment = test_input($_POST["comment"]);
      }
      function test_input($data)
      {
	      $data = trim($data);
	      $data = stripslashes($data);
	      $data = htmlspecialchars($data);
	      return $data;
	   }
		$to = 'raphaeljones1984@gmail.com';
      //$subject = 'Marriage Proposal';
      //$from = 'peterparker@email.com';
 
      // To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
      // Create email headers
      $headers .= 'From: '.$email."\r\n".
      'Reply-To: '.$email."\r\n" .
      'X-Mailer: PHP/' . phpversion();
 
      // Compose a simple HTML email message
      $message = '<html><body>';
      $message .= '<h1 style="color:#f40;">Hi Jane!</h1>';
      $message .= '<p style="color:#080;font-size:18px;">'.$comment.'</p>';//??
      $message .= '</body></html>';
 
		// Sending email
		if(mail($to, $subject, $message, $headers)){
		    echo 'Your mail has been sent successfully.';
		} else{
		    echo 'Unable to send email. Please try again.';
		}
?>


