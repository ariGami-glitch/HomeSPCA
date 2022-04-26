<style>
.buttonlink {
    background: none!important;
    border: none;
    padding: 0!important;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 19px;
    color: #001460;  
    cursor: pointer;
    font-weight: bold;
}
.buttonLink:hover {
    color: #3ABBAD;
}
</style>
<?php
session_start();
session_cache_expire(30);
include_once('database/dbSubmissions.php');
include_once('domain/Submission.php');
?>
<html>
<head>
        <title>
        SPCA Adoption Stories
        </title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div id="container">
<?php
include('header.php');
?>
<div class="topnav">
<a class="active" href="index.php">Home</a>
<a href="makeNewSubmission.php">Make A Submission</a>
<a href="viewAccSubs.php">View Stories</a>
<a href="login_form.php">Admin Login</a>
<a href="about2.php">About</a>
<div class="topnav-right">
<label for="type" style="font-size:14px; color:white; padding-top: 25px;">Pet Type:</label>
<select name="type" id="type">
<option value="">---Choose Type---</option>
<option value="Dog">Dog</option>
<option value="Cat">Cat</option>
<option value="Other">Other</option>
</select>
</div>
</div>
<?php

echo '<div id="content"><center>';

?>
    
    <div class="div2">
    <h1>SPCA Story Highlights</h1>
    </div>
    <div id="slideshow">
	<div class="slide-wrapper">
	<?php
    //$approved = retrieve_approved_submissions();
    $approved = post_to_website();
    for ($i = 0; $i < count($approved); $i++) {
	    	echo "<div class='slide'>";
 		echo "<div class='slide-number'>";
                
                $image = $approved[$i]->get_image();
                $image_src = "pictures/".$image;

                $name = $approved[$i]->get_first_name();
                $petname = $approved[$i]->get_pet_name();
		$petType = $approved[$i]->get_pet_type();
		$id = $approved[$i]->get_id();
                echo "<table style width='400'><tr><td><img src=".$image_src." width='600' height='400'></td></tr>";
                echo "<tr><td style='text-align:center'><strong><font size='5'>" .$petname. "</font></strong>";
		echo "<tr><td style='text-align:center'><font size='3'>Adopted by ". $name . "</font></td></tr>";
		echo "<tr><td style='text-align:center'><form method='POST' action='viewStory.php'>
		<input type='hidden' name='id' value='".$id."'>
		<input type='submit' class='buttonlink' value='read more'></form></td></tr></table>";
                
		echo "</div></div>";
	}
        
	?>
    </div>
    </div> 
</div></div></div></div><br>
	<?php include('footer2.inc'); ?>
</body>
</html>
<style>
.div2 {
    font-size: 17px;
    padding-bottom: 20px;
    color: #0C009D;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
}
.topnav-right {
    float: right;
    font-size: 16px;
    margin-right: 10px;
    padding-top: 25px;
}
</style>
