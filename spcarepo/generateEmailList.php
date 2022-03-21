<?php
session_start();
session_cache_expire(30);
include_once('database/dbEmails.php');
include_once('database/dbLog.php');
echo('<p><strong>Email List</strong><br />');
?>
<table>
	<fieldset>
<?php
select_dbEmail();
	?> 
	</fieldset>
	</br>
	<fieldset>
	<?php
	?>
</table>

