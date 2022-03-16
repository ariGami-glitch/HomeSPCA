<?php


echo('<p><strong>Generate Email List</strong><br />');
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
		echo('<input type="submit" value="Submit Form" name="Submit Story"><br /><br />');
	?>
</form>

