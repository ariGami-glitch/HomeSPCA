<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
	//$mail->SMTPDebug = 2;
	$mail->isSMTP();
	$mail->Host  = 'smtp.gmail.com;';
	$mail->SMTPAuth = true;
	$mail->Username = 'fredspca430@gmail.com';
	$mail->Password = 'kittens123!';
	$mail->SMTPSecure = 'tls';
	$mail->Port  = 587;
	$mail->setFrom('from@gmail.com', 'FXBG_SPCA');
	//$mail->addAddress('spca430@gmail.com');
	//$mail->addAddress('brian2wolf2@gmail.com', 'Name');
	$mail->isHTML(true);
	$mail->Subject = 'Email Verification';
	//$mail->Body = 'Please enter the access code to verify your email address with the <b>Fredericksburg SPCA</b>: ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	//$mail->send();
	//echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<?php

session_start();
session_cache_expire(30);

?>
<style>
input[type=submit] {
    background: #3ABBAD;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 15px 15px 15px 15px;
}
</style>
<html>
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <head><title>Verify Your Email</title></head>
    <body>
	<div id="container">
	    <?PHP
	    include('header.php');
	    ?>
<div class="topnav">
<a href="index.php">Home</a>
<a href="makeNewSubmission.php">Make A Submission</a>
<a href="login_form.php">Admin Login</a>
<a>About</a>
<div class="topnav-right">
<input type="text" placeholder="Search..">
</div>
</div>
        <?php
        echo "<div id='content'>";
	    include('emailValidate.inc');
	    echo "<center><h1><text style='color: blue'>Submit Your Adoption Story</color></h1></center><br>";
	  
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
			echo "<center><h2>Verify your email address</h2><br><br>
			<table><tr><td><strong><font color='red'>Error: Invalid email address</font></strong></td></tr>
			<tr><td><br>Enter your email here:</td></tr>
			<tr><td><form method='POST'><input type='text' size='46' name='email'><?td></tr>
			</table><br><br><input type='hidden' name='_email_enter' value=1>
			<input type='submit' value='Send Code'></form><br><br>";
		    }
		    else {
			// send and enter access code
			$access = substr(md5(uniqid(rand(), true)), 16, 8);
			echo $access;
			$mail->addAddress($email);
			$mail->Body = 'Please enter the access code to verify your email address with
				the <b>Fredericksburg SPCA</b>: '.$access;
			$mail->send();
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
			<form method='POST' action='makeNewSubmission.php'>
			<input type='hidden' name='email' value='".$email."'>
			<input type='submit' name='Submit' value='Enter your adoption story'></form>";
		    }
		    else {
			echo "<center><h2>Verify your email address</h2><br><br>
			<table><tr><td><strong><font color='red'>Error: inccorrect code entered</font></strong></td></tr>
			<tr><td><br>Enter the code that was sent to your email:</td></tr>
			<tr><td><form method='POST'><input type='text' size='46' name='code'></td></tr>
			<input type='hidden' name='email' value='".$email."'>
			<input type='hidden' name='access' value='".$_POST['access']."'>
			<input type='hidden' name='_email_enter' value=1>
			<input type='hidden' name='_enter_code' value=1></table><br><br>
			<input type='submit' value='Enter Code'></form><br><br>";
		    }
		}
	    }

	    ?>
	</div>  
	<?php include('footer2.inc'); ?>
    </body>
</html> 
