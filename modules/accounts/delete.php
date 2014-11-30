<?php
checkLogin();

#get the invoice id
$serial_no = $_GET['serial_no'];
$account = getAccount($serial_no);

$smarty -> assign("account",$account);

if ( ($_GET['stage'] == 2 ) AND ($_POST['doDelete'] == 'y') ) {
	global $dbh;

	$dbh->beginTransaction();
	$error = false;

	if (! deleteAccount('accounts','serial_no',$serial_no)) {
		$error = true;
	}

	if ($error) {
		$dbh->rollBack();
	} 

	else {
		$dbh->commit();
	}
	echo "<meta http-equiv='refresh' content='2;URL=index.php?module=accounts&view=manage' />";
}

$smarty -> assign('pageActive', 'accounts');
$smarty -> assign('active_tab', '#account');
?>
