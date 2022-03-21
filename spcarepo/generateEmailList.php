<?php
session_start();
session_cache_expire(30);
include_once('database/dbEmails.php');
include_once('database/dbLog.php');
echo('<p><strong>Email List</strong><br />');
?>
<html>
<?php
email=select_dbEmail();
?>
<head></head>
<body>
<div id="emails">
<?php
include('emails.inc');
email=select_dbEmail();
?>
</html>
