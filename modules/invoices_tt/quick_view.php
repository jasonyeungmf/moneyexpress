<?php

checkLogin();

#get the invoice id
$invoice_id = $_GET['id'];

$invoice = getInvoiceTT($invoice_id);
$customer = getCustomer($invoice['customer_id']);
$biller = getBiller($invoice['biller_id']);
$preference = getPreference($invoice['preference_id']);
$defaults = getSystemDefaults();
$trading_type = getTradingType($invoice['trading_type_id']);
$payment_type = getPaymentType($invoice['payment_type_id']);
$account = getAccount($invoice['account_id']);
$currency = getCurrencyTT($invoice['currency_id']);

   $eway_check = new eway();
   $eway_check->invoice = $invoice;
   $eway_pre_check = $eway_check->pre_check();

	$url_for_pdf = "./index.php?module=export&view=pdf&id=" . $invoice['id'];
	$invoice['url_for_pdf'] = $url_for_pdf;

if($invoice['customer_id'] != "1")
{
	//Hide id number
	if($customer["id_no"] == ""){
		$id_no = "";
	}
	if($customer["id_no"] != ""){
		$id_no = "[Y]";
	}
	$customer_detail = $customer['name']."-".$customer['attention']."-".$id_no."-".$customer['mobile_phone']."-".$customer['phone']."-".$customer['fax'];
}
if($invoice['customer_id'] == "1")
{
	$customer_detail = $account['name'];
}

$smarty -> assign("defaults",$defaults);
$smarty -> assign("preference",$preference);
$smarty -> assign("biller",$biller);
$smarty -> assign("customer",$customer);
$smarty -> assign("invoice",$invoice);
$smarty -> assign("wordprocessor",$config->export->wordprocessor);
$smarty -> assign("spreadsheet",$config->export->spreadsheet);
$smarty -> assign("jpg",$config->export->jpg);
$smarty -> assign("customerAccount",$customerAccount);
$smarty -> assign("eway_pre_check",$eway_pre_check);
$smarty -> assign("trading_type",$trading_type);
$smarty -> assign("payment_type",$payment_type);
$smarty -> assign("account",$account);
$smarty -> assign("currency",$currency);
$smarty -> assign("customer_detail",$customer_detail);

$smarty -> assign('pageActive', 'invoice_tt');
$smarty -> assign('subPageActive', 'invoice_tt_view');
$smarty -> assign('active_tab', '#invoice');

?>
