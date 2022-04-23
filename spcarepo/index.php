
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
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
