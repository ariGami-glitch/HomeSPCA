
<?php
session_start();
session_cache_expire(30);
include_once('database/dbSubmissions.php');
include_once('domain/Submission.php');
?>
<html>
<head>
        <title>
        <?php
        echo('HOME');
        ?>
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
<a href="login_form.php">Admin_Login</a>
</div>
<?php
//echo '<img src="spca.jpg" alt="SPCA Logo">';
echo '<div id="content"><center>';
echo '<h1>SPCA Story Highlights</h1>';
//echo('<p><form method="post"><input type="hidden" name="clicked" value="true"><input type="submit" name="adminlog" value="Administrative Login">');
//echo( '<a href="login_form.php"><h2>Administrative Login</h2></a>');
//echo('<form action="submissionEdit.php" method="get"><input type="submit" value="Make A Submission"></form>');

//echo( '<a href="login_form.php"><h2>Administrative Login</h2></a>');
//echo( '<a href="makeNewSubmission.php"><h2>Make A Submission</h2></a>');

//echo( '<a href="viewAccSubs.php"><h2>View Approved Submissions</h2></a><br><br>');
//echo $_SESSION['logged_in'];
?>
    <div id="slideshow">
        <div class="slide-wrapper">
 	<div class="slide">
            <h1 class="slide-number">
                <?php
                $approved = retrieve_approved_submissions();
                $image = $approved[0]->get_image();
                $image_src = "pictures/".$image;
                $name = $approved[0]->get_first_name();
                $petname = $approved[0]->get_pet_name();
                $petType = $approved[0]->get_pet_type();
                echo "<table style width='400'><tr><td><img src=".$image_src." width='400' height='300'></tr></td></table>";
                echo $name." and ". $petname. "<br>";
                echo "Pet type: ". $petType. "<br>";
                //echo( '<a href="viewStory.php">read more</a>');
                echo( '<form method="post"><input type="hidden" name="adopter" value="hi"><a href="viewStory.php">read more</a>');
                //echo('<p><form method="post"><input type="hidden" name="clicked" value="true"><input type="submit" name="adminlog" value="Administrative Login">');
                //echo (' <a href="viewStory.php">read more</a><br>');.
                ?>
            </h1>
        </div>
        <div class="slide">
            <h1 class="slide-number">
                <?php
                //echo "hi";
                $approved = retrieve_approved_submissions();
                $image = $approved[1]->get_image();
                $image_src = "pictures/".$image;
                $name = $approved[1]->get_first_name();
                $petname = $approved[1]->get_pet_name();
                $petType = $approved[1]->get_pet_type();
                echo "<table style width='400'><tr><td><img src=".$image_src." width='400' height='300'></tr></td></table>";
                echo $name." and ". $petname. "<br>";
                echo "Pet type: ". $petType. "<br>";
                echo( '<a href="viewStory.php">read more</a>');
                //echo (' <a href="viewStory.php">read more</a><br>');.*/
                ?>
            </h1>
        </div>
        <div class="slide">
            <h1 class="slide-number">
                <?php
                //echo "hi";
                $approved = retrieve_approved_submissions();
                $image = $approved[2]->get_image();
                $image_src = "pictures/".$image;
                $name = $approved[2]->get_first_name();
                $petname = $approved[2]->get_pet_name();
                $petType = $approved[2]->get_pet_type();
                echo "<table style width='400'><tr><td><img src=".$image_src." width='400' height='300'></tr></td></table>";
                echo $name." and ". $petname. "<br>";
                echo "Pet type: ". $petType. "<br>";
                echo( '<a href="viewStory.php">read more</a>');
                //echo (' <a href="viewStory.php">read more</a><br>');.*/
                ?>
            </h1>
        </div>
        <div class="slide">
            <h1 class="slide-number">
                <?php
                //echo "hi";
                $approved = retrieve_approved_submissions();
                $image = $approved[3]->get_image();
                $image_src = "pictures/".$image;
                $name = $approved[3]->get_first_name();
                $petname = $approved[3]->get_pet_name();
                $petType = $approved[3]->get_pet_type();
                echo "<table style width='400'><tr><td><img src=".$image_src." width='400' height='300'></tr></td></table>";
                echo $name." and ". $petname. "<br>";
                echo "Pet type: ". $petType. "<br>";
                echo( '<a href="viewStory.php">read more</a>');
                //echo (' <a href="viewStory.php">read more</a><br>');.*/
                ?>
            </h1>
	</div>
    </div>
    </div> 
	<?php //include('footer2.inc'); ?>
</div></div></div>
	<?php include('footer2.inc'); ?>
</body>
</html>
