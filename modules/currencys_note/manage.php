<?php

print_r($defaults);

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$sql = "SELECT count(*) as count FROM ".TB_PREFIX."currencys_note";
$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
$number_of_rows  = $sth->fetch(PDO::FETCH_ASSOC);

$defaults = getSystemDefaults();
$smarty -> assign("defaults",$defaults);
$smarty -> assign("number_of_rows",$number_of_rows);

$smarty -> assign('pageActive', 'currencys_note');
$smarty -> assign('active_tab', '#currency');
?>