<?php
/*
 * Copyright 2015 by Allen Tucker. This program is part of RMHP-Homebase, which is free 
 * software.  It comes with absolutely no warranty. You can redistribute and/or 
 * modify it under the terms of the GNU General Public License as published by the 
 * Free Software Foundation (see <http://www.gnu.org/licenses/ for more information).
 */
session_start();
session_cache_expire(30);
?>
<html>
    <head>
        <title>
            SPCA Adoption Stories
        </title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <style>
        	#appLink:visited {
        		color: gray; 
        	}
        </style> 
    </head>
    <body>
	<?PHP include('header.php'); ?>
        <div id="container">
            <div id="content">
		<?PHP
		
                include_once('database/dbAdmins.php');
                include_once('domain/Admin.php');
                
		date_default_timezone_set('America/New_York');
				
                if ($_SESSION['access_level'] == 2) {
		    $person = retrieve_admin($_SESSION['_id']);
                    echo "<br><br><center><table>";
                    echo "<tr><td><h2>Welcome, " . $person->get_first_name() . ", to the Admin homepage!</td></tr>";
                }
                else 
                    echo "<p>Welcome!";
		echo "<tr><td>Today is " . date('l F j, Y') . ".<p></h2></td></tr></table>";
		echo "<br><br><br>";
                ?>
		</div>
                    <?PHP include('footer2.inc'); ?>
                <!-- your main page data goes here. This is the place to enter content -->
                <p>
                    <?PHP
		    if ($_SESSION['first_visit'] !== 1) {
			    $_SESSION['first_visit'] = 1;
			    $_SESSION['access_level'] = 0;
			    header("Location: viewerHomepage.php");
			
		    }
		    else if ($_SESSION['access_level'] == 0) { 
			    header("Location: viewerHomepage.php");
	     	    }
                    if ($person) {
                        if ($person->get_first_name() != 'guest'){
                          
                        }

                        if ($_SESSION['access_level'] == 1) {
                            	
                        	
                        }
                        
                        if ($_SESSION['access_level'] == 2) {
                            
                        }
                    }
                    ?>
		    </div>
        </div>
    </body>
</html>
