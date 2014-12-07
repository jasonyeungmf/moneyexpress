<?php

checkLogin();

#get the invoice id
$invoice_id = $_GET['id'];

$invoice = getInvoice($invoice_id);
$customer = getCustomer($invoice['customer_id']);
$biller = getBiller($invoice['biller_id']);
$preference = getPreference($invoice['preference_id']);
$defaults = getSystemDefaults();
$invoiceItems = invoice::getInvoiceItems($invoice_id);
$trading_type = getTradingType($invoice['trading_type_id']);

$eway_check = new eway();
$eway_check->invoice = $invoice;
$eway_pre_check = $eway_check->pre_check();

$url_for_pdf = "./index.php?module=export&view=pdf&id=" . $invoice['id'];
        
$invoice['url_for_pdf'] = $url_for_pdf;

//Customer accounts sections
$customerAccount = null;
$customerAccount['total'] = calc_customer_total($customer['customer_no']);

$smarty -> assign('pageActive', 'invoice');
$smarty -> assign('subPageActive', 'invoice_view');
$smarty -> assign('active_tab', '#invoice');
$smarty -> assign("invoiceItems",$invoiceItems);
$smarty -> assign("defaults",$defaults);
$smarty -> assign("preference",$preference);
$smarty -> assign("biller",$biller);
$smarty -> assign("customer",$customer);
$smarty -> assign("invoice",$invoice);
$smarty -> assign("wordprocessor",$config->export->wordprocessor);
$smarty -> assign("spreadsheet",$config->export->spreadsheet);
$smarty -> assign("customerAccount",$customerAccount);
$smarty -> assign("eway_pre_check",$eway_pre_check);
$smarty -> assign("trading_type",$trading_type);
?>
