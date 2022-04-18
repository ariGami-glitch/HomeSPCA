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
		    echo "<center><h2>Verify your email address</h2><br><br>
		    <table><tr><td>Enter your email here:</td></tr>
		    <tr><td><form method='POST'><input type='text' size='46' name='email'></td></tr>
		    </table><br><br><input type='hidden' name='_email_enter' value=1>
		    <input type='submit' value='Send Code'></form><br><br>";
	    }
	    else {
		$email = trim(str_replace('\\\'', '\'', htmlentities($_POST['email'])));	
		if ($_POST['_enter_code'] != 1) {
		    // test if email is valid
		    $valid = valid_email($email);
	
		    if (!$valid) {
		        // enter email again
			
		    }
		    else {
			// send and enter access code
			$access = substr(md5(uniqid(rand(), true)), 10, 10);
			echo $access;
			echo "<center><h2>Verify your email address</h2><br><br>
			<table><tr><td>Enter the code that was sent to your email:</td></tr>
			<tr><td><form method='POST'><input type='text' size='46' name='code'></td></tr>
			<input type='hidden' name='email' value='".$email."'>
			<input type='hidden' name='access' value='".$access."'>
			<input type='hidden' name='_email_enter' value=1>
			<input type='hidden' name='_enter_code' value=1></table><br><br>
			<input type='submit' value='Enter Code'></form><br><br><br>";
		    }
		}
		else {
		    $code = trim(str_replace('\\\'', '\'', htmlentities($_POST['code'])));
			// code was entered, test if it is correct or not
		    if (strcmp($code, $_POST['access']) == 0) {
			echo "<center><h2>Your email has been verified!</h2><br><br>
			<form method='POST' action='makeNewSubmission.php>
			<input type='hidden' name='email' value='".$email."'>
			<input type='submit' name='Submit' value='Enter your adoption story'></form>";
		    }
		}
	    }

	    ?>
	</div>  
	<?php include('footer2.inc'); ?>
    </body>
</html> 
