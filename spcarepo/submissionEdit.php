<?php


session_start();
session_cache_expire(30);
include_once('database/dbSubmissions.php');
include_once('domain/Submission.php');
include_once('database/dbLog.php');

$submission = new Submission(null, null, null, null, null, null, null, null, null);

?>
<html>
    <head></head>
    <body>
	<div id="container">
	    <?PHP
	    include('submissionValidate.inc');
	    if ($_POST['_form_submit'] != 1) {
		include('submissionForm.inc');
	    }
	    else {
    		$errors = validate_submission($submission);
		if ($errors) {
		    show_errors($errors);
		    $submission = new Submission($_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['pet_type'], $_POST['description'], $_POST['pet_name'], 0, $_POST['image']);
		    include('submissionForm.inc');
		}
    		else {
    		    process_submission($submission);
		    echo "</div>";
		include('footer.inc');
		echo('</div></body></html>');
		die();
		}
	    }


	    function process_submission($submission) {
		$email = trim(str_replace('\\\'', '\'', htmlentities($_POST['email'])));
		$first_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['first_name'])));
		$last_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['last_name'])));
		$pet_type = trim(str_replace('\\\'', '\'', htmlentities($_POST['pet_type'])));
		$description = trim(str_replace('\\\'', '\'', htmlentities($_POST['description'])));
		$pet_name = trim(str_replace('\\\'', '\'', htmlentities($_POST['pet_name'])));
		$approved = 0;
		
		$name = $_FILES['image']['name'];
		$image = $name.uniqid();
		$target_dir = "pictures/";
		$target_file = $target_dir.basename($_FILES["image"]["name"]);

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");

		if (in_array($imageFileType, $extensions_arr)) {
			if (move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image)) {}
		}	
		
		$dup = retrieve_submission($email);
		
		if ($dup)
		    echo('<p class="error"Unable to add your submission to the database. <br> Another person with the same email is already there.');
		else {
		    
		    $newsubmission = new Submission($email, $first_name, $last_name, $pet_type, $description, $pet_name, $approved, $image);
		    $result = add_submission($newsubmission);
		    
		    if (!$result)
			echo('Unable to add');
		    else {
			echo("<p>Your form has been successfully submitted.</p>");
			echo("<form action='viewerHomepage.php' method='get'>
			<input type='submit' value='Back to Homepage'>
			</form>");			
		    } 
		}
	    }
	    ?>
	</div>    
    </body>
</html> 
