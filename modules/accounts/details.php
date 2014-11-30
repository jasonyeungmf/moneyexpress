<?php
checkLogin();

$serial_no = $_GET['serial_no'];
$account = getAccount($serial_no);

//$files = getLogoList();

//$customFieldLabel = getCustomFieldLabels();

$smarty->assign('account', $account);
 
//$smarty->assign('files', $files);
//$smarty->assign('customFieldLabel', $customFieldLabel);

$smarty -> assign('pageActive', 'account');
$subPageActive = $_GET['action'] =="view"  ? "account_view" : "account_edit" ;
$smarty -> assign('subPageActive', $subPageActive);
$smarty -> assign('active_tab', '#account');
?>
