<?php
/*
* Script: add_invoice_item.php
* 	add new invoice item in edit page
*
* License:
*	 GPL v3 or above
*
* Website:
* 	http://www.simpleinvoices.org
*/


if(isset($_POST['submit'])) {
	insertInvoiceItem(
		$_POST['id'],
		$_POST['quantity1'],
		$_POST['product1'],
		$_POST['trading_type_id'],
		$_POST['tax_id'],
		$_POST['description'],
		$_POST['unit_price1']
		$_POST['note_cost1']
	);
}
else {

//$products = getActiveProducts();
$currencys_note = getActiveCurrencysNote();
$trading_types = getActiveTradingTypes();

//$smarty -> assign("products",$products);
$smarty -> assign("currencys_note",$currencys_note);
$smarty -> assign("trading_types",$trading_types);
}

$type = $_GET[type];
$smarty -> assign("type",$type);

$smarty -> assign('pageActive', 'invoice');
$smarty -> assign('active_tab', '#invoice');
?>