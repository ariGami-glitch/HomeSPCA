<?php 
session_start();
session_cache_expire(30);
include_once("database/dbSubmissions.php");
include_once("domain/Submission.php");

?>
<!--  page generated by the BowdoinRMH software package -->
<html>
    <head>
        <title>Unapproved Submissions</title>
        <!--  Choose a style sheet -->
        <link rel="stylesheet" href="styles.css" type="text/css"/>
        <!-- <link rel="stylesheet" href="calendar.css" type="text/css"/> -->
        <!--    <link rel="stylesheet" href="calendar_newGUI.css" type="text/css"/> -->
    </head>
    <!--  Body portion starts here -->
    <body>
	<div id="container">
<?php
		include('header.php');
		echo "<div id='content'>";
			echo "<center><h1>Unapproved Submissions</h1>";
			//echo "<br><form action='index.php' method='get'>
			//<input type='submit' value='Back to Homepage'></form><center>";
			$subs = retrieve_unapproved_submissions();
			
			for ($i = 0; $i < count($subs); $i++){
				//echo "<br><table style width='800'>";
				$id = $subs[$i]->get_id();
				$name = $subs[$i]->get_pet_name();
				$adopter = $subs[$i]->get_first_name()." ".$subs[$i]->get_last_name();
				$type = $subs[$i]->get_pet_type();
				
				$image = $subs[$i]->get_image();
				$image_src = "pictures/".$image;
				echo "<br><table style width='400'>";
				echo "<tr><td><img src=".$image_src." width='400' height='300'></td></tr>";
				echo "<tr><td><center><p style='font-size:25px;margin-bottom:0;'><b>".$name."</b></p>";
				echo "<br>Adopted by ".$adopter."</td></tr></table><br>";	

				echo "<form action='verifySubmission.php' method='post'>
				<input type='hidden' value='".$id."' name='id'>
				<input type='submit' value='View Submission'>
				</form><br>";
			}
			echo "<br>";
	?>
    </div>
                    <?PHP include('footer2.inc'); ?></div>
    </body>
</html>

