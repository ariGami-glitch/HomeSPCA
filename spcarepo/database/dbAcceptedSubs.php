<?php


include_once('dbinfo.php');
include_once(dirname(__FILE__).'/../domain/AcceptedSubs.php');


function add_submission($submission) {
	if (!$submission instanceof Submission)
		die("Error: add_submission type mismatch");
	$con=connect();
	$query = "SELECT * FROM dbAcceptedSubs WHERE email = '" . $submission->get_email() . "'";
	$result = mysqli_query($con,$query);
		
	if ($result == null || mysqli_num_rows($result) == 0) {
		mysqli_query($con,'INSERT INTO dbAcceptedSubs VALUES("' .
			$submission->get_email() . '","' .
			$submission->get_first_name() . '","' .
			$submission->get_last_name() . '","' .
			$submission->get_pet_type() . '","' .
			$submission->get_description() . '","' .
			$submission->get_pet_name() . '","' .
			$submission->get_approved() . '","' .
			$submission->get_image() . 
			'");');
		mysqli_close($con);
		return true;
	}
	mysqli_close($con);
	return false;
}

function remove_submission($email) {
	$con=connect();
	$query = 'SELECT * from dbAcceptedSubs WHERE email = "' . $email . '"';
	$result = mysqli_query($con,$query);
	if ($result == null || mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$query = 'DELETE FROM dbAcceptedSubs WHERE email = "' . $email . '"';
	$result = mysqli_query($con,$query);
	mysqli_close($con);
	return true;
}

function retrieve_submission($email) {
	$con=connect();
	$query = "SELECT * FROM dbAcceptedSubs WHERE email = '" . $email . "'";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) !== 1) {
		mysqli_close($con);
		return false;
	}
	$result_row = mysqli_fetch_assoc($result);
	$theSubmission = make_a_submission($result_row);
	
	return $theSubmission;
}

function make_a_submission($result_row) {
	$theSubmission = new Submission(
			$result_row['email'], 
			$result_row['first_name'], 
			$result_row['last_name'], 
			$result_row['pet_type'], 
			$result_row['descrip'], 
			$result_row['pet_name'], 
			$result_row['approved'], 
			$result_row['image']);
	return $theSubmission;
}
?>
