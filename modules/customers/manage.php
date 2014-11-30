<?php
checkLogin();

	$sql = "SELECT count(*) as count FROM ".TB_PREFIX."customers";
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	$number_of_customers  = $sth->fetch(PDO::FETCH_ASSOC);

$smarty -> assign('number_of_customers', $number_of_customers);
$smarty -> assign("customers",$customers);

$smarty -> assign('pageActive', 'customer');
$smarty -> assign('active_tab', '#people');
?>
