<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the currency(TT) id
$currency_cny_id = $_GET['id'];

$currency_cny = getCurrencyCny($currency_cny_id);

#get custom field labels
$customFieldLabel = getCustomFieldLabels();

$smarty -> assign("defaults",getSystemDefaults());
$smarty -> assign('currency_cny',$currency_cny);
$smarty -> assign('customFieldLabel',$customFieldLabel);

$smarty -> assign('pageActive', 'currencys_cny');
$subPageActive = $_GET['action'] =="view"  ? "currency_cny_view" : "currency_cny_edit" ;
//$smarty -> assign('subPageActive', $subPageActive);
$smarty -> assign('active_tab', '#product');
?>
