<?php


include_once('dbinfo.php');
include_once(dirname(__FILE__).'/../domain/Submission.php');


function add_submission($submission) {
	if (!$submission instanceof Submission)
		die("Error: add_submission type mismatch");
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE email = '" . $submission->get_email() . "'";
	$result = mysqli_query($con,$query);
		
	if ($result == null || mysqli_num_rows($result) == 0) {
		mysqli_query($con,'INSERT INTO dbSubmissions VALUES("' .
			$submission->get_email() . '","' .
			$submission->get_first_name() . '","' .
			$submission->get_last_name() . '","' .
			$submission->get_pet_type() . '","' .
			$submission->get_description() . '","' .
			$submission->get_pet_name() . '","' .
			$submission->get_approved() . '","' .
			$submission->get_image() . '","' .
		        $submission->get_opt_in() .	
			'");');
		mysqli_close($con);
		return true;
	}
	mysqli_close($con);
	return false;
}

function update_submission($email, $desc, $pt) {
	//if (!$submission instanceof Submission)
	//	die("Error: add_submission type mismatch");
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE email = '" . $email . "'";
	$result = mysqli_query($con,$query);

	if ($result == null || mysqli_num_rows($result) == 0) {
		mysqli_query($con,"UPDATE dbSubmissions SET
		pet_type = '" . $pet_type . "', 
		description = '" . $description . "',
		WHERE email = '" . $email . "';'");
		mysqli_close($con);
		return true;
	}
	mysqli_close($con);
	return false;
}

function print_approved_submissions($acceptedSubs){
	for($i = 0; $i < count($acceptedSubs); $i++){		
		echo $acceptedSubs[$i]->get_email();
		echo $acceptedSubs[$i]->get_first_name();
		echo $acceptedSubs[$i]->get_last_name();
		echo $acceptedSubs[$i]->get_pet_type();
		echo $acceptedSubs[$i]->get_description();
		echo $acceptedSubs[$i]->get_pet_name();
		echo $acceptedSubs[$i]->get_approved();
		echo $acceptedSubs[$i]->get_image();
	}
}

function remove_submission($email) {
	$con=connect();
	$query = 'SELECT * from dbSubmissions WHERE email = "' . $email . '"';
	$result = mysqli_query($con,$query);
	if ($result == null || mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$query = 'DELETE FROM dbSubmissions WHERE email = "' . $email . '"';
	$result = mysqli_query($con,$query);
	mysqli_close($con);
	return true;
}

function retrieve_submission($email) {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE email = '" . $email . "'";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) !== 1) {
		mysqli_close($con);
		return false;
	}
	$result_row = mysqli_fetch_assoc($result);
	$theSubmission = make_a_submission($result_row);
	
	return $theSubmission;
}

/*
function retrieve_approved_submission($email) {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE approved = true";
	$result_row = mysqli_query($con,$query);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$acceptedSubs = array();
	for($i = 0; $i < count($result_row); $i++){
		$result = mysqli_fetch_assoc($result_row[$i]);
		$theSubmission = make_a_submission($result);
		$acceptedSubs[$i] = $theSubmission;
	}
	return $acceptedSubs;
}

function retrieve_unapproved_submission($email) {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE approved = false";
	$result_row = mysqli_query($con,$query);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$unacceptedSubs = array();
	for($i = 0; $i < count($result_row); $i++){
		$result = mysqli_fetch_assoc($result_row[$i]);
		$theSubmission = make_a_submission($result);
		$unacceptedSubs[$i] = $theSubmission;
	}
	return $unacceptedSubs;
*/
function approve_submission($email){
	$con=connect();
	$query = 'UPDATE dbSubmissions SET approved = 1 WHERE email = "'.$email.'"';
	$result = mysqli_query($con,$query);
	return true;
}

function make_a_submission($result_row) {
	$theSubmission = new Submission(
			$result_row['email'], 
			$result_row['first_name'], 
			$result_row['last_name'], 
			$result_row['pet_type'], 
			$result_row['description'], 
			$result_row['pet_name'], 
			$result_row['approved'], 
			$result_row['image'],
			$result_row['opt_in']);
	return $theSubmission;
}

function retrieve_approved_submissions() {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE approved = 1";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$acceptedSubs = array();
	while($row = mysqli_fetch_assoc($result)) {
		$theSubmission = make_a_submission($row);
		$acceptedSubs[] = $theSubmission;
	}
	/**for ($i = 0; $i < count($result_row); $i++) {
		$result = mysqli_fetch_assoc($result_row[$i]);
		$theSubmission = make_a_submission($result);
		$acceptedSubs += $theSubmission;
	}*/
	return $acceptedSubs;
}

function retrieve_unapproved_submissions() {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE approved = 0";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$newSubs = array();
	while($row = mysqli_fetch_assoc($result)) {
		$theSubmission = make_a_submission($row);
		$newSubs[] = $theSubmission;
	}
	
	return $newSubs;
}

function display_submissions($subs){
	for ($i = 0; $i < count($subs); $i++){
		echo $subs[$i]->get_email();
		echo $subs[$i]->get_first_name();
		echo $subs[$i]->get_last_name();
		echo $subs[$i]->get_pet_name();
		echo $subs[$i]->get_pet_type();
		echo $subs[$i]->get_description();
	}
}

function display_submission($sub){
	echo "Email: ".$sub->get_email()."<br>";
	echo "Adopter name: ".$sub->get_first_name()." ".$sub->get_last_name()."<br>";
	echo "Pet name: ".$sub->get_pet_name()."<br>";
	echo "Pet type: ".$sub->get_pet_type()."<br>";
	echo "Adoption story: ".$sub->get_description()."<br>";
}

function display_emails($subs) {
    for ($i = 0; $i < count($subs); $i++) {
        echo $subs[$i]->get_first_name();
        echo $subs[$i]->get_last_name();
        echo $subs[$i]->get_email();
    }
}

function display_email($sub) {
    echo "Adopter name: ".$subs[$i]->get_first_name()." ".$subs[$i]->get_last_name(). " email: ".$subs[$i]->get_email()."<br>";
    
}
function retrieve_optin() {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$Subs = array();
	while($row = mysqli_fetch_assoc($result)) {
		$theSubmission = make_a_submission($row);
		$Subs[] = $theSubmission;
	}
	/**for ($i = 0; $i < count($result_row); $i++) {
		$result = mysqli_fetch_assoc($result_row[$i]);
		$theSubmission = make_a_submission($result);
		$acceptedSubs += $theSubmission;
	}*/
	return $Subs;
}
?>

