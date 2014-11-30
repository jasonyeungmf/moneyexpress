<?php
checkLogin();

$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['name'] != "" ) {
	include("./modules/customers/save.php");
}
$smarty -> assign('customFieldLabel',$customFieldLabel);

$smarty -> assign('pageActive', 'customer');
$smarty -> assign('subPageActive', 'customer_add');
$smarty -> assign('active_tab', '#people');
?>
