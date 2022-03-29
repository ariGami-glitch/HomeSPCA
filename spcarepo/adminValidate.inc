<?php


function validate_admin($admin) {
	if ($_POST['first_name'] == null)
		$errors[] = 'Please enter a first name';
	if ($_POST['last_name'] == null)
		$errors[] = 'Please enter a last name';
	if ($_POST['email'] == null)
		$errors[] = 'Please enter a valid email';
	if ($_POST['username'] == null)
		$errors[] = 'Please enter your username';
	if ($_POST['password'] == null)
		$errors[] = 'Please enter your password';
	if ($_POST['password2'] == null)
		$errors[] = 'Please enter your password confirmation';
	if (strcmp($_POST['password'], $_POST['password2']) != 0)
		$errors[] = 'Your passwords do not match';
	return $errors;
}

function show_errors($e) {
	echo('<div class="warning">');
	echo('<ul>');
	foreach ($e as $error) {
	    echo("<li><strong><font color=\"red\">" . $error . "</font></strong></li>\n");
	}
	echo("</ul></div></p>");
}
?>
