<?php
include('emailValidate.inc');

function validate_admin($admin) {
	$first_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['first_name']))); 
	$last_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['last_name'])));
	$email = trim(str_replace('\\\'', '\'', htmlentities($_POST['email'])));
	$username = trim(str_replace('\\\'', '\'', htmlentities($_POST['username'])));
	$password = trim(str_replace('\\\'', '\'', htmlentities($_POST['password'])));
	$password2 = trim(str_replace('\\\'', '\'', htmlentities($_POST['password2'])));
	if (retrieve_admin($username))
		$errors[] = 'Username is already taken';
	if ($first_name == null)
		$errors[] = 'Please enter a first name';
	if ($last_name == null)
		$errors[] = 'Please enter a last name';
	if ($email == null || !valid_email($email)) 
		$errors[] = 'Please enter a valid email';
	if ($username == null)
		$errors[] = 'Please enter your username';
	if ($password == null)
		$errors[] = 'Please enter your password';
	if ($password2 == null)
		$errors[] = 'Please enter your password confirmation';
	if (strcmp($password, $password2) != 0)
		$errors[] = 'Your passwords do not match';
	return $errors;
}

function show_errors($e) {
	echo('<br><div class="warning"><center><table style="width:370">');
	echo('<ul>');
	foreach ($e as $error) {
	    echo("<tr><td style='padding:0px'><li><strong><font color=\"red\">" . $error . "</font></strong></li></td></tr>");
	}
	echo("</ul></table><br></div></p>");

}
?>
