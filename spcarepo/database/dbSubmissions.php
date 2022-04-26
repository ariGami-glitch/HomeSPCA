<?php


include_once('dbinfo.php');
include_once(dirname(__FILE__).'/../domain/Submission.php');

function add_submission($submission) {
	if (!$submission instanceof Submission)
		die("Error: add_submission type mismatch");
	$con=connect();
	//$query = "SELECT * FROM dbSubmissions WHERE email = '" . $submission->get_email() . "'";
	//$result = mysqli_query($con,$query);
		
	if ($result == null || mysqli_num_rows($result) == 0) {
		$result = mysqli_query($con,'INSERT INTO dbSubmissions(email, first_name, last_name, pet_type,
			description, pet_name, approved, image, id)
		       	VALUES("' .
			$submission->get_email() . '","' .
			$submission->get_first_name() . '","' .
			$submission->get_last_name() . '","' .
			$submission->get_pet_type() . '","' .
			$submission->get_description() . '","' .
			$submission->get_pet_name() . '","' .
			0 . '","' .
			$submission->get_image() . '","' .
			0 .   	
			'");');
		mysqli_close($con);
		return $result;
	}
	mysqli_close($con);
	return false;
}

function update_submission($id, $desc, $pt) {
	//if (!$submission instanceof Submission)
	//	die("Error: add_submission type mismatch");
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE id = '" . $id . "'";
	$result = mysqli_query($con,$query);

	if ($result !== null && mysqli_num_rows($result) !== 0) {
		$result2 = mysqli_query($con,"UPDATE dbSubmissions SET
		pet_type = '" . $pt . "', 
		description = '" . mysqli_real_escape_string($con, $desc) . "'
		WHERE id = '" . $id . "';");
		mysqli_close($con);
		return $result2;
	}
	mysqli_close($con);
	return false;
}


function retrieve_submission($id) {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE id = '" . $id . "'";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) !== 1) {
		mysqli_close($con);
		return false;
	}
	$result_row = mysqli_fetch_assoc($result);
	$theSubmission = make_a_submission($result_row);
	
	return $theSubmission;
}

function remove_submission($id) {
	$con=connect();
	$query = 'SELECT * FROM dbSubmissions WHERE id = "'.$id.'"';
	$result = mysqli_query($con,$query);
	if ($result == null || mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
	$query = 'DELETE FROM dbSubmissions WHERE id = "'.$id.'"';
	$result = mysqli_query($con, $query);
	mysqli_close($con);
	return true;
}

function approve_submission($id){
	$con=connect();
	$query = 'UPDATE dbSubmissions SET approved = 1 WHERE id = "'.$id.'"';
	if ($query) {
	    $result = mysqli_query($con,$query);
	}
	return true;
}

function unapprove_submission($id){
	$con=connect();
	$query = 'UPDATE dbSubmissions SET approved = 0 WHERE id = "'.$id.'"';
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
			$result_row['image'],
			$result_row['id']);
	return $theSubmission;
}

function retrieve_approved_submissions() {
	$con=connect();
	$query = "SELECT * FROM dbSubmissions WHERE approved = 1 ORDER BY id DESC";
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
	$query = "SELECT * FROM dbSubmissions WHERE approved = 0 ORDER BY id DESC";
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

function get_current_highlights($lastdate) {
    $con = connect();
    $query = 'SELECT * FROM dbsubmissions WHERE dateHighlighted = "'.$lastdate.'"';
    $result = mysqli_query($con, $query);
    $highlights = array();
    $n = mysqli_num_rows($result);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
    while($row = mysqli_fetch_assoc($result)) {
        $theSub = make_a_submission($row);
        $highlights[] = $theSub;
    }
    //$n = "hi";
    mysqli_close($con);
    return $highlights;

}

function get_new_highlights($lastdate){
    //before the query
    $con = connect();
    $query = 'SELECT * FROM dbsubmissions WHERE approved = 1 and dateHighlighted is NULL or dateHighlighted <>"'.$lastdate.'" limit 4';
    $result = mysqli_query($con, $query);
    $highlights = array();
    $n = mysqli_num_rows($result);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
    $i = 0;
    if(mysqli_num_rows($result) == 4) {
        while($row = mysqli_fetch_assoc($result)) {
            $theSub = make_a_submission($row);
            $highlights[$i] = $theSub;
            $i = $i + 1;
        }
        mysqli_close($con);
    }
    else {
        //make it up by just inserting at the $i 
        mysqli_close($con);
        
        
    }
    return $highlights;

}

function post_to_website() {
//determine the last highlighted date
	$con=connect();
	$query = "SELECT * FROM dbsubmissions WHERE approved = 1 ORDER BY dateHighlighted DESC LIMIT 1";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) == 0) {
		mysqli_close($con);
		return false;
	}
    $row = mysqli_fetch_assoc($result);
    
    //case for when there are no submissions
    if($row == null) {
        return false;
    }
    mysqli_close($con);
    $lastdate = $row['dateHighlighted'];
//get the current date
    $today = date("Y-m-d");
    //add 14 days to the last date
    $compare = date('Y-m-d', strtotime($lastdate. ' + 14 days'));
    if($today < $compare) {
        $highlights = get_current_highlights($lastdate);
        return $highlights;
        //return "bye";
    }
    else {
        //this means it has passed two weeks
        $highlights = get_new_highlights($lastdate);
        //update the dateHighlighted here

        return $highlights;
    }
    return false;
}

?>

