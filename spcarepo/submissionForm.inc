<?php

echo('<form action="index.php" method="get"><input type="submit" value="Back to Homepage"></form>');
echo('<p><strong>Adoption Story Submission Form</strong><br />');
echo('When finished, hit <b>Submit</b> at the bottom of this page.');
//echo('<form action="viewerHomepage.php" method="get"><input type="submit" value="Back to Homepage"></form>');

?>

<form method="POST">
	<input type="hidden" name="_form_submit" value="1">
	<fieldset>
	    <legend>Adopter Information:</legend>
	<?php
		echo '<p>First Name: <input type="text" name="first_name" tabindex="1" value="'.$submission->get_first_name().'">';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; <p>Last Name: <input type="text" name="last_name" tabindex="2" value="<?PHP echo($submission->get_last_name()) ?>">
	<p>Email address: <input type="text" name="email" tabindex="3" value="<?PHP echo($submission->get_email()) ?>">
	</fieldset>
	</br>
	<fieldset>
	    <legend>Adoption Information:</legend>
	<?php
		echo '<p>Pet Name: <input type="text" name="pet_name" tabindex="4" value="'.$submission->get_pet_name().'">';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; <p> Pet Type: <input type="text" name="pet_type" tabindex="5" value="<?PHP echo($submission->get_pet_type()) ?>">
	<?php 
		echo('<p>Adoption Story:<br />');
		echo('<textarea name="description" rows="7" cols="60">');
		echo($submission->get_description().'</textarea>');
	?>
	<p>Photo: <input type="file" name="image" tabindex="6" value="<?PHP echo($submission->get_image()) ?>">
	</fieldset>
	</br>

	<?php
		echo('<input type="submit" value="Submit Form" name="Submit Story"><br /><br />');
	?>
</form>

