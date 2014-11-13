<?php

checkLogin();
//$provinces = getActiveProvinces();

//$files = getLogoList();

//$smarty->assign("files", $files);

//$customFieldLabel = getCustomFieldLabels();

if ($_POST['customer_no'] != "") {
	include ("./modules/accounts/save.php");
}

//$smarty->assign('files', $files);
//$smarty->assign('customFieldLabel', $customFieldLabel);
$smarty->assign('save', $save);
//$smarty->assign('provinces', $provinces);

$smarty -> assign('pageActive', 'account');
$smarty -> assign('subPageActive', 'account_add');
$smarty -> assign('active_tab', '#account');
?>
