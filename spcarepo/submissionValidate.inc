<?php


function validate_submission($submission) {
	if ($_POST['first_name'] == null)
		$errors[] = 'Please enter a first name';
	if ($_POST['last_name'] == null)
		$errors[] = 'Please enter a last name';
	if ($_POST['email'] == null)
		$errors[] = 'Please enter a valid email';
	if ($_POST['pet_name'] == null)
		$errors[] = 'Please enter the name of your pet';
	if ($_POST['pet_type'] == null)
		$errors[] = 'Please enter your type of pet';
	if ($_POST['description'] == null)
		$errors[] = 'Please enter your adoption story';
	//if ($_POST['image'] == null)
	//	$errors[] = 'Please upload a photo of your pet';
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
