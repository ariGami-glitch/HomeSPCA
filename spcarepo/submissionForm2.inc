<style>
td {padding:5px;}
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
	<center><table>	
	    <tr><td><strong>Adopter Information</strong></td></tr>
	<?php
		echo '<tr><td><br>First Name: </td></tr><tr><td><input type="text" size="56" name="first_name" tabindex="1" value="'.$submission->get_first_name().'"></td></tr>';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; <tr><td>Last Name: </td></tr><tr><td><input type="text" size="56" name="last_name" tabindex="2" value="<?PHP echo($submission->get_last_name()) ?>"></td></tr>
	<tr><td>Email address: </td></tr><tr><td><input type="text" size="56" name="email" tabindex="3" value="<?PHP echo($submission->get_email()) ?>"></td></tr>
	<tr><td>Check box to be added to our email list. <input type="checkbox" name="opt_in"></td></tr>
	
	    <tr><td><br><strong>Adoption Information</strong></td></tr>
	<?php
		echo '<tr><td><br>Pet Name: </td></tr><tr><td><input type="text" size="56" name="pet_name" tabindex="4" value="'.$submission->get_pet_name().'"></td></tr>';
	?>  &nbsp;&nbsp;&nbsp;&nbsp; 
	<tr><td> Pet Type: 
	<select name="pet_type">
	<option value="Dog">Dog</option>
	<option value="Cat">Cat</option>
	<option value="Other">Other</option>
	</select></td><tr>		
	<tr><td> If other, please specify:
	</td></tr><tr><td><input type="text" size="56" name="pet_type_other" tabindex="5"></td></tr>
	<?php 
		echo('<tr><td>Adoption Story:</td><tr>');
		echo('<tr><td><textarea name="description" rows="7" cols="56">');
		echo($submission->get_description().'</textarea></td></tr>');
	?>
	<tr><td>Photo: <input type="file" name="image" tabindex="6" value="<?PHP echo($submission->get_image()) ?>"></td></tr>
	</table><br><br>

	<?php
		echo('<input type="submit" value="Submit Form" name="Submit Story"><br /><br />');
	?>
</form>

