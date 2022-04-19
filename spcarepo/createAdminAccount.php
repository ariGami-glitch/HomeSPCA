<style>
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
}
</style>
<?php

session_start();
session_cache_expire(30);
include_once('database/dbAdmins.php');
include_once('domain/Admin.php');
include_once('database/dbLog.php');

$admin = new Admin(null, null, null, null, null);

?>
<html>
    <link rel="stylesheet" href="lib/jquery-ui.css" />
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <!--<link rel="stylesheet" href="lib/jquery.timepicker.css" />-->
    <head></head>
    <body>
	<div id="container">
	<?PHP include('header.php'); ?>
	    <div id="content">
	   <?PHP
	    echo "<center><h1>Create New Admin Account</h1></center>";
	    include('adminValidate.inc');
	    if ($_POST['_form_submit'] != 1) {
		    //echo "<center><h1>Create New Admin Account</h1></center><br>";
		    include('adminForm.inc');
		    //include('footer2.php');
	    }
	    else {
    		$errors = validate_admin($admin);
		if ($errors) {
		    show_errors($errors);
		    $admin = new Admin($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['username'], $_POST['password']);
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
		$password = md5($password);	
		
		$new_admin = new Admin($first_name, $last_name, $email, $username, $password);
		$result = add_admin($new_admin);
		echo "<center><br><br>";
		if (!$result)
		    echo('Unable to add');
		else {
		    echo("<font size='+1'>Account has been successfully created!</font><br><br><br><br>");
		    echo "<form action='createAdminAccount.php'>
		    <input type='submit' value='Return'></form>";
 		    echo "</div>";
		    include('footer2.inc');			 
		}
	    }
	?>
	</div>
	</div>   
                    <?PHP include('footer2.inc'); ?>
    </body>
</html> 
