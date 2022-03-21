<?php
session_start();
session_cache_expire(30);
include_once('database/dbEmails.php');
include_once('database/dbLog.php');
echo('<p><strong>Email List</strong><br />');
?>
<html>
<head>Email List</head>
<body>
<div id="emails">
<?php
include('emailList.inc');
$email=select_dbEmail();
echo[$email];
?>
</div>
</html>
