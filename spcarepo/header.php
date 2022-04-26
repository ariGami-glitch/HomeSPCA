<?php
/*
 * Copyright 2013 by Allen Tucker. 
 * This program is part of RMHP-Homebase, which is free software.  It comes with 
 * absolutely no warranty. You can redistribute and/or modify it under the terms 
 * of the GNU General Public License as published by the Free Software Foundation
 * (see <http://www.gnu.org/licenses/ for more information).
 * 
 */
?>
<!-- Begin Header -->
<style type="text/css">
    h1 {padding-left: 0px; padding-right:0px;}
</style>
<div id="header">
</div>

<div align="center" id="navigationLinks">

    <?PHP
    include("header2.php");
    
    if ($_SESSION['first_visit'] !== 0) {

        //pages guests are allowed to view
        $permission_array['index.php'] = 0;
        $permission_array['about2.php'] = 0;
	$permission_array['viewAccSubs.php'] = 0;
	$permission_array['viewStory.php'] = 0;
	$permission_array['makeNewSubmission.php'] = 0;

	//pages only admins can view
	$permission_array['viewSubmission.php'] = 2;
        $permission_array['viewNewSubs.php'] = 2;
	$permission_array['verifySubmission.php'] = 2;
	$permission_array['editSubmission.php'] = 2;
        $permission_array['emailList.php'] = 2;
        $permission_array['createAdminAccount.php'] = 2;
        $permission_array['adminViewSubs.php'] = 2;
        $permission_array['adminNewSubmission.php'] = 2;
        $permission_array['approveSub.php'] = 2;
        $permission_array['denySub.php'] = 2;
	
        //Check if they're at a valid page for their access level.
        $current_page = substr($_SERVER['PHP_SELF'], strpos($_SERVER['PHP_SELF'],"/")+1);
	$current_page = substr($current_page, strpos($current_page,"/")+1);
	$current_page = substr($current_page, strpos($current_page,"/")+1);
        
        if($permission_array[$current_page]>$_SESSION['access_level']){
            //in this case, the user doesn't have permission to view this page.
		//we redirect them to the index page.		
	    echo "<script type=\"text/javascript\">window.location = \"viewerHomepage.php\";</script>";
            //note: if javascript is disabled for a user's browser, it would still show the page.
            //so we die().
            die();
        }
        //This line gives us the path to the html pages in question, useful if the server isn't installed @ root.
        $path = strrev(substr(strrev($_SERVER['SCRIPT_NAME']), strpos(strrev($_SERVER['SCRIPT_NAME']), '/')));   
    }
    ?>
</div>
<!-- End Header -->
<style>
.topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 25px 20px;
    text-decoration: none;
    font-size: 15px;
}
.topnav a:hover {
    background-color: #CAA900;
    color: white;
    border-radius: 12px 12px 12px 12px;
    text-decoration: underline;
    font-weight: bold
}  
.topnav a.active {
    background-color: #C60070;
    color: white;
    border-radius: 12px 12px 12px 12px;
    font-weight: bold;
}
.topnav-right {
    float: right;
}
.topnav input[type=text] {
    float: right;
    padding: 6px;
    border: none;
    margin-top: 19px;
    margin-right: 16px;
    font-size: 20px;
}
</style>
