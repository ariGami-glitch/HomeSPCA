<?php

session_start();
include_once("database/dbSubmissions.php");
include_once("domain/Submission.php");

?>
<!--  page generated by the BowdoinRMH software package -->
<html>
    <head>
        <title>Approved Submission</title>
        <!--  Choose a style sheet -->
        <link rel="stylesheet" href="styles.css" type="text/css"/>
        <!--<link rel="stylesheet" href="calendar.css" type="text/css"/> -->
        <!--    <link rel="stylesheet" href="calendar_newGUI.css" type="text/css"/> -->
    </head>
    <!--  Body portion starts here -->
    <body>
    <div id="container">
		<?php
			include('header.php');
			echo "<div id='content'>";
			echo "<center><h1>Submit Your Adoption Story</h1><br>";
			echo "<h2>Your form has been successfully submitted!</h2><br><br>";	
			echo "<form action='viewNewSubs.php' method='get'>
			<input type='submit' value='Back to Homepage'></form><br><br><br>";	
		?>
    </div></div>
    <?php include('footer2.inc'); ?>
    </body>
</html>

