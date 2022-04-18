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
}
</style>

<?php
/*
 * Copyright 2013 by Allen Tucker. 
 * This program is part of RMHC-Homebase, which is free software.  It comes with 
 * absolutely no warranty. You can redistribute and/or modify it under the terms 
 * of the GNU General Public License as published by the Free Software Foundation
 * (see <http://www.gnu.org/licenses/ for more information).
 * 
 */
?><?php
session_start();
/*
 * Created on Mar 28, 2008
 * @author Oliver Radwan <oradwan@bowdoin.edu>, Sam Roberts, Allen Tucker
 * @version 3/28/2008, revised 7/1/2015
 */
?>
<link rel="stylesheet" href="styles.css" type="text/css" />
<div id="container">
<?PHP include('header.php') ?>
<div class="topnav">
<a href="index.php">Home</a>
<a href="makeNewSubmission.php">Make A Submission</a>
<a class="active" href="login_form.php">Admin Login</a>
</div>
<div id="content">
    <?PHP
    include_once('database/dbAdmins.php');
    include_once('domain/Admin.php');
    //include_once('database/dbPersons.php');
    //include_once('domain/Person.php');
    if (($_SERVER['PHP_SELF']) == "/logout.php") {
        //prevents infinite loop of logging in to the page which logs you out...
        echo "<script type=\"text/javascript\">window.location = \"index.php\";</script>";
    }
    if (!array_key_exists('_submit_check', $_POST)) {
        /*echo('<div align="left"><p>Access to Homebase requires a Username and a Password. ' .
        '<ul>'
        );*/
        echo('<center><h1>Administrative Login');
        //echo('<li>If you are applying for a volunteer position, enter the Username \'guest\' and a blank Password. ');
        //echo('<li>If you are a volunteer logging in for the first time, your Username is your first name followed by your ten digit phone number. ' .
        //'After you have logged in, you can change your password.  ');
        /*echo('<li>(If you are having difficulty logging in or have forgotten your Password, please contact either the 
        		<a href="mailto:allen@npfi.org"><i>Portland House Manager</i></a>
        		or the <a href="mailto:allen@npfi.org"><i>Bangor House Manager</i></a>.) ');
        echo '</ul>';*/
echo('<br><br><table style width="300"><form method="post"><input type="hidden" name="_submit_check" value="true"><tr><td>Username:</td></tr><tr><td><input type="text" size="48" name="user" tabindex="1"></td></tr><tr><td>Password:</td></tr><tr><td><input type="password" size="48" name="pass" tabindex="2"></td></tr><tr><td colspan="2" align="center"></td></tr></table><br><input type="submit" name="Login" value="Login">');
    } else {
        //check if they logged in as a guest:
	/*if ($_POST['user'] == "guest" && $_POST['pass'] == "") {
            $_SESSION['logged_in'] = 1;
            $_SESSION['access_level'] = 0;
            $_SESSION['venue'] = "";
            $_SESSION['type'] = "";
            $_SESSION['_id'] = "guest";
            echo "<script type=\"text/javascript\">window.location = \"index.php\";</script>";
    }
        //otherwise authenticate their password
    else {*/
	    $db_pass = $_POST['pass'];//md5($_POST['pass']);
	    $db_pass = md5($db_pass);
            $db_id = $_POST['user'];

            $admin = retrieve_admin($db_id);
            if ($admin) { //avoids null results
                if ($admin->get_password() == $db_pass) { //if the passwords match, login
                    $_SESSION['logged_in'] = 1;
		    $_SESSION['access_level'] = 2;
                    date_default_timezone_set ("America/New_York");
		     
		    //if ($admin->get_status() == "applicant")
                    //    $_SESSION['access_level'] = 0;
                    //else if (in_array('manager', $admin->get_type()))
                    //    $_SESSION['access_level'] = 2;
                    //else
                    //   $_SESSION['access_level'] = 1;
                    $_SESSION['f_name'] = $admin->get_first_name();
                    $_SESSION['l_name'] = $admin->get_last_name();
                    //$_SESSION['venue'] = $person->get_venue();
		    //$_SESSION['type'] = $person->get_type();
		    //$_SESSION['access_level'] = 2;

                    $_SESSION['_id'] = $_POST['user'];
                    echo "<script type=\"text/javascript\">window.location = \"index.php\";</script>";
                }
                else {
                    echo('<center><h1>Administrative Login</h1>');
                    echo('<p class="error">Error: invalid username/password<br /></p>'); /**if you cannot remember your password, ask either the 
        		<a href="mailto:allen@npfi.org"><i>Portland House Manager</i></a>
        		or the <a href="mailto:allen@npfi.org"><i>Bangor House Manager</i></a>. to reset it for you.</p><p>Access to Homebase requires a Username and a Password. <p>For guest access, enter Username <strong>guest</strong> and no Password.</p>');
                    echo('<p>If you are a volunteer, your Username is your first name followed by your phone number with no spaces. ' .
                    'For instance, if your first name were John and your phone number were (207)-123-4567, ' .
                    'then your Username would be <strong>John2071234567</strong>.  ');
                    echo('If you do not remember your password, please contact either the 
        		<a href="mailto:allen@npfi.org"><i>Portland House Manager</i></a>
			or the <a href="mailto:allen@npfi.org"><i>Bangor House Manager</i></a>.');*/
                    echo('<table style width="300"><form method="post"><input type="hidden" name="_submit_check" value="true"><tr><td>Username:</td></tr><tr><td><input type="text" size="48" name="user" tabindex="1"></td></tr><tr><td>Password:</td></tr><tr><td><input type="password" size="48" name="pass" tabindex="2"></td></tr><tr><td colspan="2" align="center"></td></tr></table><br><input type="submit" name="Login" value="Login"><br><br><br>');
                }
            } else {
                //At this point, they failed to authenticate
                echo('<center><h1>Administrative Login</h1>');
                echo('<p class="error">Error: invalid username/password');/**if you cannot remember your password, ask the House Manager to reset it for you.</p><p>Access to Homebase requires a Username and a Password. <p>For guest access, enter Username <strong>guest</strong> and no Password.</p>');
                echo('<p>If you are a volunteer, your Username is your first name followed by your phone number with no spaces. ' .
                'For instance, if your first name were John and your phone number were (207)-123-4567, ' .
                'then your Username would be <strong>John2071234567</strong>.  ');
                echo('If you do not remember your password, please contact either the 
        		<a href="mailto:allen@npfi.org"><i>Portland House Manager</i></a>
			or the <a href="mailto:allen@npfi.org"><i>Bangor House Manager</i></a>.'); */
		//change another
                echo('<br><center><table style width="300"><form method="post"><input type="hidden" name="_submit_check" value="true"><tr><td>Username:</td></tr><tr><td><input type="text" size="48" name="user" tabindex="1"></td></tr><tr><td>Password:</td></tr><tr><td><input type="password" size="48" name="pass" tabindex="2"></td></tr><tr><td colspan="2" align="center"></td></tr></table><br><input type="submit" name="Login" value="Login"><br><br><br>');
            }
        //}
    }
    echo "<br><br><br>";
    ?>
    <?PHP //include('footer2.inc'); ?>
</div>
</div>
    <?PHP include('footer2.inc'); ?>
</body>
</html>
