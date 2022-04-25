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
    border-radius: 15px 15px 15px 15px;
    cursor: pointer; 
}
input[type="text"] {
    font-size: 14px; 
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
<head><title>Admin Login</title></head>
<link rel="stylesheet" href="styles.css" type="text/css" />
<div id="container">
<?PHP include('header.php') ?>
<div class="topnav">
<a href="index.php">Home</a>
<a href="makeNewSubmission.php">Make A Submission</a>
<a href="viewAccSubs.php">View Submissions</a>
<a class="active" href="login_form.php">Admin Login</a>
<a href="about2.php">About</a>
<div class="topnav-right">
<input type="text" placeholder="Search..">
</div>
</div>
<div id="content" style="color:blue; padding-bottom:10px; font-weight:bold;">
    <?PHP
    include_once('database/dbAdmins.php');
    include_once('domain/Admin.php');
    
    if (($_SERVER['PHP_SELF']) == "/logout.php") {
        //prevents infinite loop of logging in to the page which logs you out...
        echo "<script type=\"text/javascript\">window.location = \"index.php\";</script>";
    }
    if (!array_key_exists('_submit_check', $_POST)) {
        
        echo('<center><h1>Administrative Login');
echo('<br><br><table style width="300"><form method="post"><input type="hidden" name="_submit_check" value="true"><tr><td style="font-size: 18px;">Username:</td></tr><tr><td><input type="text" size="44" name="user" tabindex="1"></td></tr><tr><td style="font-size:18px;">Password:</td></tr><tr><td><input type="password" size="44" name="pass" tabindex="2"></td></tr><tr><td colspan="2" align="center"></td></tr></table><br><input type="submit" name="Login" value="Login">');
    } else {
	    $db_pass = $_POST['pass'];//md5($_POST['pass']);
	    $db_pass = md5($db_pass);
            $db_id = $_POST['user'];

            $admin = retrieve_admin($db_id);
            if ($admin) { //avoids null results
                if ($admin->get_password() == $db_pass) { //if the passwords match, login
                    $_SESSION['logged_in'] = 1;
		    $_SESSION['access_level'] = 2;
                    date_default_timezone_set ("America/New_York");
		     
                    $_SESSION['f_name'] = $admin->get_first_name();
                    $_SESSION['l_name'] = $admin->get_last_name();

                    $_SESSION['_id'] = $_POST['user'];
                    echo "<script type=\"text/javascript\">window.location = \"index.php\";</script>";
                }
                else {
                    echo('<center><h1>Administrative Login</h1>');
                    echo('<table style width="300"><tr><td><font color="red"><strong>Error: Invalid username/password<br /></strong></font></td></tr><br>');
                    echo('<form method="post"><input type="hidden" name="_submit_check" value="true"><tr><td style="font-size: 18px;"><br>Username:</td></tr><tr><td><input type="text" size="44" name="user" tabindex="1"></td></tr><tr><td style="font-size: 18px;">Password:</td></tr><tr><td><input type="password" size="44" name="pass" tabindex="2"></td></tr><tr><td colspan="2" align="center"></td></tr></table><br><input type="submit" name="Login" value="Login"><br><br><br>');
                }
            } else {
                //At this point, they failed to authenticate
                echo('<center><h1>Administrative Login</h1>');
		echo('<table style width="300"><tr><td><font color="red"><strong>Error: Invalid username/password</strong></font></td></tr><br>');
                echo('<form method="post"><input type="hidden" name="_submit_check" value="true"><tr><td style="font-size: 18px;"><br>Username:</td></tr><tr><td><input type="text" size="44" name="user" tabindex="1"></td></tr><tr><td style="font-size: 18px;">Password:</td></tr><tr><td><input type="password" size="44" name="pass" tabindex="2"></td></tr><tr><td colspan="2" align="center"></td></tr></table><br><input type="submit" name="Login" value="Login"><br><br><br>');
            }
    }
    echo "<br><br>";
    ?>
</div>
</div>
    <?PHP include('footer2.inc'); ?>
</body>
</html>
