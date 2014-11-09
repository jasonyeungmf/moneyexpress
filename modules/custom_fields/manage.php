<?php
/*
* Script: manage.php
* 	Custom fields manage page
*
* License:
*	 GPL v3 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

	$sql = "SELECT count(*) as count FROM ".TB_PREFIX."custom_fields";
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	$number_of_rows  = $sth->fetch(PDO::FETCH_ASSOC);

$smarty -> assign("number_of_rows",$number_of_rows);
$smarty -> assign('pageActive', 'custom_field');
$smarty -> assign('active_tab', '#setting');
?>