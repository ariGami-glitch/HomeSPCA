<?php

echo('<form action="viewerHomepage.php" method="get"><input type="submit" value="Back to Homepage"></form>');
echo('<p><strong>Adoption Story Submission Form</strong><br />');
echo('When finished, hit <b>Submit</b> at the bottom of this page.');
//echo('<form action="viewerHomepage.php" method="get"><input type="submit" value="Back to Homepage"></form>');

?>

<form method="POST">
	<input type="hidden" name="_form_submit" value="1">
	<fieldset>
	    <legend>Adopter Information:</legend>
	<?php
		echo '<p>First Name: <input type="text" name="first_name" tabindex="1">';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; <p>Last Name: <input type="text" name="last_name" tabindex="2">
	<p>Email address: <input type="text" name="email" tabindex="3">
	</fieldset>
	</br>
	<fieldset>
	    <legend>Adoption Information:</legend>
	<?php
		echo '<p>Pet Name: <input type="text" name="pet_name" tabindex="4">';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; <p> Pet Type: <input type="text" name="pet_type" tabindex="5">
	<p>Adoption Story:<br /><textarea name="description" rows="7" cols="60"></textarea>
	<p>Photo: <input type="file" name="image" tabindex="6">
	</fieldset>
	</br>

	<?php
		echo('<input type="submit" value="Submit Form" name="Submit Story"><br /><br />');
	?>
</form>

