<?php

echo('<br><form action="index.php" method="get"><input type="submit" value="Back to Homepage"></form>');
echo('<p><strong>Create New Admin Account</strong><br />');
echo('When finished, hit <b>Submit</b> at the bottom of this page.');
//echo('<form action="viewerHomepage.php" method="get"><input type="submit" value="Back to Homepage"></form>');

?>

<form method="POST" action="" enctype='multipart/form-data'>
	<input type="hidden" name="_form_submit" value="1">
	<fieldset>
	    <legend>New Admin Information:</legend>
	<?php
		echo '<p>First Name: <input type="text" name="first_name" tabindex="1" value="'.$admin->get_first_name().'">';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; <p>Last Name: <input type="text" name="last_name" tabindex="2" value="<?PHP echo($admin->get_last_name()) ?>">
	<p>Email address: <input type="text" name="email" tabindex="3" value="<?PHP echo($admin->get_email()) ?>">
	<p>Username: <input type="text" name="username" tabindex="4" value="<?PHP echo($admin->get_username()) ?>">
	<p>Password: <input type="text" name="password" tabindex="5" value="<?PHP echo($admin->get_password()) ?>">
	<p>Re-enter Password: <input type="text" name="password2" tabindex="6" value="">
	</fieldset>
	</br> 

	<?php
		echo('<input type="submit" value="Submit Form" name="Submit Story"><br /><br />');
	?>
</form>

