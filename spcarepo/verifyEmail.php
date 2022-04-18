<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

/*try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'user@gmail.com';				
	$mail->Password = 'password';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('from@gmail.com', 'Name');		
	$mail->addAddress('receiver1@gmail.com');
	$mail->addAddress('receiver2@gmail.com', 'Name');
								
	$mail->isHTML(true);								
	$mail->Subject = 'Subject';
	$mail->Body = 'HTML message body in <b>bold</b> ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}*/

?>

<?php

session_start();
session_cache_expire(30);

?>
<html>
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <head></head>
    <body>
	<div id="container">
	    <?PHP
	    include('header.php');
	    echo "<div id='content'>";
	    include('emailValidate.inc');
	    echo "<center><h1>Submit Your Adoption Story</h1></center><br>";
	  
	    if ($_POST['_email_enter'] != 1) {
		    // enter your email
	    }
	    else {
		
		if ($_POST['_enter_code'] != 1) {
		    // test if email is valid
	
		    if (!$valid) {
		    	// enter email again
		    }
		    else {
			// send and enter access code
		    }
		}
		else {
		    // code was entered, test if it is correct or not
		}
	    }

	    ?>
	</div>  
	<?php include('footer2.inc'); ?>
    </body>
</html> 
