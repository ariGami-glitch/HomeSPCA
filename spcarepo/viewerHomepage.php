<!DOCTYPE html>
<html>
<body>
<?php
echo '<h1>SPCA Story Highlights';
echo('<p><form method="post"><input type="hidden" name="clicked" value="true"><input type="submit" name="adminlog" value="Administrative Login">');
echo( '<a href="submissionEdit.php">Make A Submission</a>');

/*if($_POST['clicked'] == "true") {
    include('login_form.php');
    die();

} else if ($_SESSION['logged_in']) {

    /*         * Set our permission array.
     * anything a guest can do, a volunteer and manager can also do
     * anything a volunteer can do, a manager can do.
     *
     * If a page is not specified in the permission array, anyone logged into the system
     * can view it. If someone logged into the system attempts to access a page above their
     * permission level, they will be sent back to the home page.
     */
    //pages guests are allowed to view
    /*$permission_array['index.php'] = 0;
    $permission_array['about.php'] = 0;
    $permission_array['apply.php'] = 0;
    //pages volunteers can view
    $permission_array['help.php'] = 1;
    $permission_array['calendar.php'] = 1;
    //pages only managers can view
    $permission_array['personsearch.php'] = 2;
    $permission_array['personedit.php'] = 2;
    $permission_array['viewschedule.php'] = 2;
    $permission_array['addweek.php'] = 2;
    $permission_array['log.php'] = 2;
    $permission_array['reports.php'] = 2;

    //Check if they're at a valid page for their access level.
    $current_page = strtolower(substr($_SERVER['PHP_SELF'], strpos($_SERVER['PHP_SELF'],"/")+1));
    $current_page = substr($current_page, strpos($current_page,"/")+1);
    
    if($permission_array[$current_page]>$_SESSION['access_level']){
        //in this case, the user doesn't have permission to view this page.
        //we redirect them to the index page.
        echo "<script type=\"text/javascript\">window.location = \"index.php\";</script>";
        //note: if javascript is disabled for a user's browser, it would still show the page.
        //so we die().
        die();
    }
    //This line gives us the path to the html pages in question, useful if the server isn't installed @ root.
    $path = strrev(substr(strrev($_SERVER['SCRIPT_NAME']), strpos(strrev($_SERVER['SCRIPT_NAME']), '/')));
    $venues = array("portland"=>"RMH Portland","bangor"=>"RMH Bangor");
    
    //they're logged in and session variables are set.
    if ($_SESSION['venue'] =="") { 
        echo(' <a href="' . $path . 'personEdit.php?id=' . 'new' . '">apply</a>');
        echo(' | <a href="' . $path . 'logout.php">logout</a><br>');
    }
    else {
        echo " <br><b>"."Homebase"."</b> ";
        if ($_SESSION['access_level'] >= 1) {
            echo('<a href="' . $path . 'index.php">home</a>');
            echo(' | <a href="' . $path . 'about.php">about</a>');
            echo(' | <a href="' . $path . 'help.php?helpPage=' . $current_page . '" target="_BLANK">help</a>');
            echo(' | calendars: <a href="' . $path . 'calendar.php?venue=portland'.''.'">Portland, </a>');
            echo(' <a href="' . $path . 'calendar.php?venue=bangor'.''.'">Bangor</a>');
        }
        if ($_SESSION['access_level'] >= 2) {
            echo('<br>master schedules: <a href="' . $path . 'viewSchedule.php?venue=portland'."".'">Portland, </a>');
            echo('<a href="' . $path . 'viewSchedule.php?venue=bangor'."".'">Bangor</a>');
            echo(' | volunteers: <a href="' . $path . 'personSearch.php">search</a>, 
                    <a href="personEdit.php?id=' . 'new' . '">add, </a> <a href="viewScreenings.php?type=new">screenings</a>');
            echo(' | <a href="' . $path . 'reports.php?venue='.$_SESSION['venue'].'">reports</a>');
        }
        echo(' | <a href="' . $path . 'logout.php">logout</a><br>');
    }
    
}*/
?>
</body>
</html>
