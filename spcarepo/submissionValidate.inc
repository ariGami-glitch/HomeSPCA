<?php


function validate_submission($submission) {
	$first_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['first_name'])));
	$last_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['last_name'])));
	$email = trim(str_replace('\\\'', '\'', htmlentities($_POST['email'])));
	$pet_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['pet_name'])));
	$pet_type = trim(str_replace('\\\'', '\'', htmlentities($_POST['pet_type'])));
	$pet_type_other = trim(str_replace('\\\'', '\'', htmlentities($_POST['pet_type_other'])));
	$description = trim(str_replace('\\\'', '\'', htmlentities($_POST['description'])));
	if ($first_name == null)
		$errors[] = 'Please enter a first name';
	if ($last_name == null)
		$errors[] = 'Please enter a last name';
	if ($email == null)
		$errors[] = 'Please enter a valid email';
	if ($pet_name == null)
		$errors[] = 'Please enter the name of your pet';
	if (strcmp($pet_type,'Other') == 0 & $pet_type_other == null)
		$errors[] = 'Please enter your type of pet';
	if ($description == null)
		$errors[] = 'Please enter your adoption story';
	if ($_FILES['image']['name'] == null)
		$errors[] = 'Please upload a photo of your pet';
	return $errors;
}

function show_errors($e) {
	echo('<div class="warning"><center><table style="width:460">');
	echo('<ul>');
	foreach ($e as $error) {
	    echo("<tr><td style='padding:0px'><li><strong><font color='red'>" . $error . "</font></strong></li></td></tr>");
	}
	echo("</ul></table><br></div></p>");
}
?>
