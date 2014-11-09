<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the currency(TT) id
$currency_tt_id = $_GET['id'];

$currency_tt = getCurrencyTT($currency_tt_id);

#get custom field labels
$customFieldLabel = getCustomFieldLabels();
//$taxes = getActiveTaxes();
//$tax_selected = getTaxRate($product['default_tax_id']);

$smarty -> assign("defaults",getSystemDefaults());
$smarty -> assign('currency_tt',$currency_tt);
//$smarty -> assign('taxes',$taxes);
//$smarty -> assign('tax_selected',$tax_selected);
$smarty -> assign('customFieldLabel',$customFieldLabel);

$smarty -> assign('pageActive', 'currencys_tt');
$subPageActive = $_GET['action'] =="view"  ? "currency_tt_view" : "currency_tt_edit" ;
$smarty -> assign('subPageActive', $subPageActive);
$smarty -> assign('active_tab', '#product');
?>
