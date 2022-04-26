<div class="header2">
	<center><a href="index.php"><img src="fredspca.png" alt="SPCA Logo"></center></a>
	<!--<form action="index.php"><input type="submit" class="button button3" value=" Home Page "></form>-->
    <?php 
	/*if ($_SESSION['access_level'] != 2) {
		echo "<form action='index.php'><input type ='submit' class='button button3' value=' Home Page '></form>";
		echo "<form action='login_form.php'>
		      <input type='submit' class='button button2' value='Admin Login'></form>";
	}
	else { echo "<br>"; }
        /*else {
		echo "<form action='logout.php'>
		      <input type='submit' class='button button2' value='     Logout    '></form>";
	}*/
	?>	
</div>


<style>
.header2 {
	padding: 14px;
	text-align: center;
	background: #00488A;
	color: #FEE94E;
	font-size: 30px;
	left: 0px;
	right: 0px;
	top: 0px;
}

.button {
    position: absolute;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-left: 0px;
    left: 40px;
    top: 9px;
    cursor: pointer;
    border-radius: 50%;
}

.button1 {background-color: #CAA900;}
.button2 {background-color: #3ABBAD; top: 65px}
.button3 {background-color: #3ABBAD;}
.topnav {
    background-color: #333;
    overflow: hidden;
}
.topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 25px 20px;
    text-decoration: none;
    font-size: 20px;
}
.topnav a:hover {
    background-color: #CAA900;
    color: white;
    border-radius: 12px 12px 12px 12px;
    text-decoration: underline;
    font-weight: bold
}  
.topnav a.active {
    background-color: #C60070;
    color: white;
    border-radius: 12px 12px 12px 12px;
    font-weight: bold;
}
.topnav-right {
    float: right;
    padding-top: 25px;
    font-size: 16px;
    margin-right: 10px;
}
.topnav input[type=text] {
    float: right;
    padding: 6px;
    border: none;
    margin-top: 19px;
    margin-right: 16px;
    font-size: 20px;
}
</style>
