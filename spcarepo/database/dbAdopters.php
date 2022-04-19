<?php
/*
 * Copyright 2013 by Jerrick Hoang, Ivy Xing, Sam Roberts, James Cook, 
 * Johnny Coster, Judy Yang, Jackson Moniaga, Oliver Radwan, 
 * Maxwell Palmer, Nolan McNair, Taylor Talmage, and Allen Tucker. 
 * This program is part of RMH Homebase, which is free software.  It comes with 
 * absolutely no warranty. You can redistribute and/or modify it under the terms 
 * of the GNU General Public License as published by the Free Software Foundation
 * (see <http://www.gnu.org/licenses/ for more information).
 * 
 */

/**
 * @version March 1, 2012
 * @author Oliver Radwan and Allen Tucker
 */
include_once('dbinfo.php');
include_once(dirname(__FILE__).'/../domain/Adopter.php');

/*
 * add an adopter to dbAdopters table: if already there, return false
 */

function add_adopter($adopter) {
    if (!$adopter instanceof Adopter)
        die("Error: add_admin type mismatch");
    $con=connect();
    $query = "SELECT * FROM dbAdopters WHERE email = '" . $adopter->get_email() . "'";
    $result = mysqli_query($con,$query);
    //if there's no entry for this email, add it
    if ($result == null || mysqli_num_rows($result) == 0) {
        mysqli_query($con,'INSERT INTO dbAdopters VALUES("' .
                $adopter->get_first_name() . '","' .
                $adopter->get_last_name() . '","' .
                $adopter->get_email() . '","' .
                $adopter->get_opt_in() .
		'");');						
        mysqli_close($con);
        return true;
    }
    mysqli_close($con);
    return false;
}

/*
 * remove an adopter from dbAdopters table.  If already there, return false
 */

function remove_adopter($email) {
    $con=connect();
    $query = 'SELECT * FROM dbAdopters WHERE email = "' . $email . '"';
    $result = mysqli_query($con,$query);
    if ($result == null || mysqli_num_rows($result) == 0) {
        mysqli_close($con);
        return false;
    }
    $query = 'DELETE FROM dbAdopters WHERE email = "' . $email . '"';
    $result = mysqli_query($con,$query);
    mysqli_close($con);
    return true;
}

/*
 * @return an Adopter from dbAdopters table matching a particular email.
 * if not in table, return false
 */

function retrieve_adopter($email) {
    $con=connect();
    $query = "SELECT * FROM dbAdopters WHERE email = '" . $email . "'";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) !== 1) {
        mysqli_close($con);
        return false;
    }
    $result_row = mysqli_fetch_assoc($result);
    // var_dump($result_row);
    $theAdopter = make_an_adopter($result_row);
//    mysqli_close($con);
    return $theAdopter;
}

// Name is first concat with last name. Example 'James Jones'
// return array of Adopters.
function retrieve_adopters_by_name ($name) {
	$adopters = array();
	if (!isset($name) || $name == "" || $name == null) return $admins;
	$con=connect();
	$name = explode(" ", $name);
	$first_name = $name[0];
	$last_name = $name[1];
    $query = "SELECT * FROM dbAdmins WHERE first_name = '" . $first_name . "' AND last_name = '". $last_name ."'";
    $result = mysqli_query($con,$query);
    while ($result_row = mysqli_fetch_assoc($result)) {
        $the_adopter = make_an_adopter($result_row);
        $adopters[] = $the_adopter;
    }
    return $adopters;	
}


/*
 * @return all rows from dbAdopters table
 * if none there, return false
 */

function getall_dbAdopters() {
    $con=connect();
    $query = "SELECT * FROM dbAdopters WHERE opt_in = 1";
    $result = mysqli_query($con,$query);
    if ($result == null || mysqli_num_rows($result) == 0) {
        mysqli_close($con);
        return false;
    }
    $result = mysqli_query($con,$query);
    $theAdmins = array();
    while ($result_row = mysqli_fetch_assoc($result)) {
        $theAdopter = make_an_adopter($result_row);
        $theAdopters[] = $theAdopters;
    }

    return $theAdopters;
}

function make_an_adopter($result_row) {
    $theAdopter = new Adopter(
                    $result_row['first_name'],
                    $result_row['last_name'],
                    $result_row['email'],
                    $result_row['opt_in']);   
    return $theAdopter;
}

function opt_in($email) {
	$con=connect();
	$query="UPDATE dbAdopters SET opt_in = 1 WHERE email = '".$email."'";
	$result = mysqli_query($con,$query);

	//if ($result == null || mysqli_num_rows($result) == 0) {
	//	mysqli_close($con);
	//	return false;
	//}
	return true;
}
?>
