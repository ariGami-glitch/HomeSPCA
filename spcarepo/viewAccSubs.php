<?php 
session_start();
session_cache_expire(30);
include_once("database/dbSubmissions.php");
include_once("domain/Submission.php");

?>
<!--  page generated by the BowdoinRMH software package -->
<html>
    <head>
        <title>
        Accepted Submissions
        </title>
        <!--  Choose a style sheet -->
        <link rel="stylesheet" href="styles.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="calendar.css" type="text/css"/> -->
        <!--    <link rel="stylesheet" href="calendar_newGUI.css" type="text/css"/> -->
    </head>
    <!--  Body portion starts here -->
    <body>
    <div id="container">
    <?PHP //include('header.php'); ?>
		<?php
			include('header.php');
			echo "<div id='content'>";
			echo "<center><h1>Adoption Stories</h1></center>";
			echo "<br><center><form action='index.php' method='get'>
			<input type='submit' value='Back to Homepage'></form>";
			$approvedSubs = retrieve_approved_submissions();
			
			for ($i = 0; $i < count($approvedSubs); $i++){
				//echo "<br><table style width='800'>";
				$email = $approvedSubs[$i]->get_email();
				$name = $approvedSubs[$i]->get_pet_name();
				$adopter = $approvedSubs[$i]->get_first_name()." ".$approvedSubs[$i]->get_last_name();
				$type = $approvedSubs[$i]->get_pet_type();
				
				$image = $approvedSubs[$i]->get_image();
				$image_src = "pictures/".$image;
				echo "<br><table style width='400'>";
				echo "<tr><td><img src=".$image_src." width='400' height='300'></td></tr>";
				echo "<tr><td><center><p style='font-size:25px;margin-bottom:0;'><b>".$name."</b></p>";
				echo "<br>Adopted by ".$adopter."</td></tr></table><br>";	

				echo "<form action='viewStory.php' method='post'>
				<input type='hidden' value='".$email."' name='email'>
				<input type='submit' value='View Adoption Story'>
				</form><br>";
			}
			echo "<br>";
		?>
    </body>
</html>

