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
include_once(dirname(__FILE__).'/../domain/Admin.php');

/*
 * add a admin to dbAdmins table: if already there, return false
 */

function add_admin($admin) {
    if (!$admin instanceof Admin)
        die("Error: add_admin type mismatch");
    $con=connect();
    $query = "SELECT * FROM dbAdmins WHERE username = '" . $admin->get_username() . "'";
    $result = mysqli_query($con,$query);
    //if there's no entry for this email, add it
    if ($result == null || mysqli_num_rows($result) == 0) {
        mysqli_query($con,'INSERT INTO dbAdmins VALUES("' .
                $admin->get_email() . '","' .
                $admin->get_first_name() . '","' .
                $admin->get_last_name() . '","' .
                $admin->get_username() . '","' .
                $admin->get_password() .
		'");');						
        mysqli_close($con);
        return true;
    }
    mysqli_close($con);
    return false;
}

/*
 * remove a admin from dbAdmins table.  If already there, return false
 */

function remove_admin($email) {
    $con=connect();
    $query = 'SELECT * FROM dbAdmins WHERE email = "' . $email . '"';
    $result = mysqli_query($con,$query);
    if ($result == null || mysqli_num_rows($result) == 0) {
        mysqli_close($con);
        return false;
    }
    $query = 'DELETE FROM dbAdmins WHERE email = "' . $email . '"';
    $result = mysqli_query($con,$query);
    mysqli_close($con);
    return true;
}

/*
 * @return a Admin from dbAdmins table matching a particular email.
 * if not in table, return false
 */

function retrieve_admin($username) {
    $con=connect();
    $query = "SELECT * FROM dbAdmins WHERE username = '" . $username . "'";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) !== 1) {
        mysqli_close($con);
        return false;
    }
    $result_row = mysqli_fetch_assoc($result);
    // var_dump($result_row);
    $theAdmin = make_a_admin($result_row);
//    mysqli_close($con);
    return $theAdmin;
}
// Name is first concat with last name. Example 'James Jones'
// return array of Admins.
function retrieve_admins_by_name ($name) {
	$admins = array();
	if (!isset($name) || $name == "" || $name == null) return $admins;
	$con=connect();
	$name = explode(" ", $name);
	$first_name = $name[0];
	$last_name = $name[1];
    $query = "SELECT * FROM dbAdmins WHERE first_name = '" . $first_name . "' AND last_name = '". $last_name ."'";
    $result = mysqli_query($con,$query);
    while ($result_row = mysqli_fetch_assoc($result)) {
        $the_admin = make_a_admin($result_row);
        $admins[] = $the_admin;
    }
    return $admins;	
}

function change_password($email, $newPass) {
    $con=connect();
    $query = 'UPDATE dbAdmins SET password = "' . $newPass . '" WHERE email = "' . $email . '"';
    $result = mysqli_query($con,$query);
    mysqli_close($con);
    return $result;
}

/*
 * @return all rows from dbAdmins table ordered by last name
 * if none there, return false
 */

function getall_dbAdmins($name_from, $name_to, $venue) {
    $con=connect();
    $query = "SELECT * FROM dbAdmins";
    $query.= " WHERE venue = '" .$venue. "'"; 
    $query.= " AND last_name BETWEEN '" .$name_from. "' AND '" .$name_to. "'"; 
    $query.= " ORDER BY last_name,first_name";
    $result = mysqli_query($con,$query);
    if ($result == null || mysqli_num_rows($result) == 0) {
        mysqli_close($con);
        return false;
    }
    $result = mysqli_query($con,$query);
    $theAdmins = array();
    while ($result_row = mysqli_fetch_assoc($result)) {
        $theAdmin = make_a_admin($result_row);
        $theAdmins[] = $theAdmin;
    }

    return $theAdmins;
}

function make_a_admin($result_row) {
    $theAdmin = new Admin(
                    $result_row['first_name'],
                    $result_row['last_name'],
                    $result_row['email'],
                    $result_row['username'],
                    $result_row['password']);   
    return $theAdmin;
}

function getall_names($status, $type, $venue) {
    $con=connect();
    $result = mysqli_query($con,"SELECT email,first_name,last_name,type FROM dbAdmins " .
            "WHERE venue='".$venue."' AND status = '" . $status . "' AND TYPE LIKE '%" . $type . "%' ORDER BY last_name,first_name");
    mysqli_close($con);
    return $result;
}
?>
