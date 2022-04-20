
<?php
session_start();
session_cache_expire(30);
include_once("database/dbSubmissions.php");
include_once("domain/Submission.php");

?>
<!--  page generated by the BowdoinRMH software package -->
<html>
    <head>
	<script>        
	function clicked1(e)
        {
            if (!confirm('Are you sure you want to approve this submission?')) {
                e.preventDefault();
            }
	}
	function clicked2(e)
	{
	    if (!confirm('Are you sure you want to deny this submission?')) {
		e.preventDefault();
	    }
	}
	</script>
        <title>Submission</title>
        <!--  Choose a style sheet -->
        <link rel="stylesheet" href="styles.css" type="text/css"/>
        
        <!--    <link rel="stylesheet" href="calendar_newGUI.css" type="text/css"/> -->
    </head>
    <!--  Body portion starts here -->
    <body>
	<div id="container">
	<?php
		include('header.php');
		echo "<div id='content'>";	
		$id = $_POST['id'];

	 	echo "<center><h1>New Submission</h1>";	
		if ($_POST['updated'] == 'updated') {
			$update_desc = trim(str_replace('\\\'', '\'', htmlentities($_POST['description'])));
			$update_pet_type = trim(str_replace('\\\'', '\'', htmlentities($_POST['pet_type'])));
			if ($update_desc == null || $update_pet_type == null) {
			    echo "<br><strong><font color='red'>Error: Submission could not be updated with invalid values</font></strong>";
			}
			else {
			    update_submission($id, $update_desc, $update_pet_type);
			    echo "<br><strong><font color='#3ABBAD' size='+1'>Successfully updated!</font></strong>";
	     		}
    			echo "<br><br><br>";			
		}
		
		//display_submission($sub);
		$sub = retrieve_submission($id);
		$adopter = $sub->get_first_name()." ".$sub->get_last_name();
		$pet_name = $sub->get_pet_name();
		$pet_type = $sub->get_pet_type();
		$story = $sub->get_description();
		$image = $sub->get_image();
		$image_src = "pictures/".$image;
		echo "<table style width='500'><tr><td><img src=".$image_src." width='500' height='350'></td></tr>";
		echo "<tr><td><br><b>Pet Name:</b> ".$pet_name."</td></tr>";
		echo "<tr><td><b>Adopter:</b> ".$adopter."</td></tr>";
		echo "<tr><td><b>Pet Type:</b> ".$pet_type."</td></tr>";
		echo "<tr><td><b>Description:</b></td></tr>";
		echo "<tr><td>".nl2br($story)."</td></tr></table><br><br>";
		
		echo "<table style width='400'>";
		echo "<tr><form action='approveSub.php' method='post'>
		<input type='hidden' value='".$id."' name='id'>
		<input type='submit', value='Accept' onclick='clicked1(event)'></form>&emsp;&emsp;&emsp;&emsp;";
		echo "<form action='denySub.php' method='post'>
		<input type='hidden' value='".$id."' name='id'>
		<input type='submit' value='Decline' onclick='clicked2(event)'></form>&emsp;&emsp;&emsp;&emsp;";
		echo "<form action='editSubmission.php' method='post'>
		<input type='hidden' value='".$id."' name='id'>
		<input type='submit' value='  Edit  '></form></tr></table><br><br><br>";
		//echo "<form action='viewNewSubs.php' method='get'>
		//<input type='submit' value='View Other Submissions'></form><br><br>";
	?>
    </div></div>
    <?php include('footer2.inc'); ?>
    </body>
</html>

