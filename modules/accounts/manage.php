<?php
checkLogin();

$sql = "SELECT count(*) as count FROM ".TB_PREFIX."accounts";
$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
$number_of_accounts  = $sth->fetch(PDO::FETCH_ASSOC);

$smarty -> assign("number_of_accounts",$number_of_accounts);
$smarty -> assign('pageActive', 'account');
$smarty -> assign('active_tab', '#account');
?>
