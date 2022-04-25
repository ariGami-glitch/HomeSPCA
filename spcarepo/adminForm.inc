<?php

//echo('<br><form action="index.php" method="get"><input type="submit" value="Back to Homepage"></form>');
//echo('<tr><td><strong>Create New Admin Account</strong></td></tr><br />');
//echo('<tr><td>When finished, hit <b>Submit</b> at the bottom of this page.</td></tr>');
//echo('<form action="viewerHomepage.php" method="get"><input type="submit" value="Back to Homepage"></form>');

?>
<style>
td {padding:3px;}
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
    border-radius: 14px 14px 14px 14px;
}
</style>

<form method="POST" action="" enctype='multipart/form-data'>
	<input type="hidden" name="_form_submit" value="1">
	
	<?php
		echo "<center><table>";
		echo '<tr><td>First Name: </td></tr><tr><td><input type="text" size="43" name="first_name" tabindex="1" value="'.$admin->get_first_name().'"></td></tr>';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; <tr><td><br>Last Name: </td></tr><tr><td><input type="text" size="43" name="last_name" tabindex="2" value="<?PHP echo($admin->get_last_name()) ?>"></td></tr>
	<tr><td><br>Email address: </td></tr><tr><td><input type="text" size="43" name="email" tabindex="3" value="<?PHP echo($admin->get_email()) ?>"></td></tr>
	<tr><td><br>Username: </td></tr><tr><td><input type="text" size="43" name="username" tabindex="4" value="<?PHP echo($admin->get_username()) ?>"></td></tr>
	<tr><td><br>Password: </td></tr><tr><td><input type="password" size="43" name="password" tabindex="5" value="<?PHP echo($admin->get_password()) ?>"></td></tr>
	<tr><td><br>Re-enter Password: </td></tr><tr><td><input type="password" size="43" name="password2" tabindex="6" value=""></td></tr>
	</table><br>
	<br><input type="submit" value="Create Account" name="Submit Story"><br /><br />

</form>

