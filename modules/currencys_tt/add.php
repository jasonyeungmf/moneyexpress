<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
$customFieldLabel = getCustomFieldLabels();
//$taxes = getActiveTaxes();
//if valid then do save
if ($_POST['code'] != "" ) {
	include("./modules/currencys_tt/save.php");
}
$smarty -> assign("defaults",getSystemDefaults());
$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);
//$smarty -> assign('taxes',$taxes);

$smarty -> assign('pageActive', 'currencys_tt');
$smarty -> assign('active_tab', '#product');
?>
