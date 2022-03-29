<?php

session_start();
session_cache_expire(30);
include_once('database/dbAdmins.php');
include_once('domain/Admin.php');
include_once('database/dbLog.php');

$admin = new Admin(null, null, null, null, null);

?>
<html>
    <head></head>
    <body>
	<div id="container">
	    <?PHP
	    include('header2.php');
	    include('adminValidate.inc');
	    if ($_POST['_form_submit'] != 1) {
		    include('adminForm.inc');
		    include('footer2.php');
	    }
	    else {
    		$errors = validate_admin($admin);
		if ($errors) {
		    show_errors($errors);
		    $admin = new Admin($_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['password']);
		    include('adminForm.inc');
		}
    		else {
    		    process_admin($admin);
		    echo "</div>";
		//include('footer2.php');
		echo('</div></body></html>');
		die();
		}
	    }

	    function process_admin($admin) {
		$email = trim(str_replace('\\\'', '\'', htmlentities($_POST['email'])));
		$first_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['first_name'])));
		$last_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['last_name'])));
		$username = trim(str_replace('\\\'', '\'', htmlentities($_POST['username'])));
		$password = trim(str_replace('\\\'', '\'', htmlentities($_POST['password'])));
		
		$dup = retrieve_admin($email);
		if ($dup)
			echo('<p class="error"Unable to add your admin to the database. <br> Email is already in the database.');
		else {
		    $new_admin = new Admin($email, $first_name, $last_name, $username, $password);
		    $result = add_admin($new_admin);

		    if (!$result)
			echo('Unable to add');
		    else {
			echo("<p>Your form has been successfully submitted.</p>");
			echo("<form action='index.php' method='get'>
			<input type='submit' value='Back to Homepage'>
			</form>");			
		    } 
		}
	    }
	    ?>
	</div>   
    </body>
</html> 
