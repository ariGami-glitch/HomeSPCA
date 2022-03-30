<!DOCTYPE html>
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
include('header2.php');
//echo '<img src="spca.jpg" alt="SPCA Logo">';
echo '<h1>&emsp; &emsp; &emsp; &emsp;SPCA Story Highlights</h1>';
echo('<p><form method="post"><input type="hidden" name="clicked" value="true"><input type="submit" name="adminlog" value="Administrative Login">');
//echo('<form action="submissionEdit.php" method="get"><input type="submit" value="Make A Submission"></form>');
echo( '<a href="submissionEdit.php"><h2>Make A Submission</h2></a>');
echo( '<a href="viewAccSubs.php"><h2>View Approved Submissions</h2></a><br><br>');

?>
    <div id="slideshow">
        <div class="slide-wrapper">
        <div class="slide">
            <h1 class="slide-number">
                Test 1
            </h1>
        </div>
        <div class="slide">
            <h1 class="slide-number">
                Test 2
            </h1>
        </div>
        <div class="slide">
            <h1 class="slide-number">
                Test 3
            </h1>
        </div>
    </div>
    </div>
</div>
</body>
</html>
