<?php
checkLogin();

#get the invoice id
$master_invoice_id = $_GET['id'];

$invoice = getInvoice($master_invoice_id);
$invoiceItems = invoice::getInvoiceItems($master_invoice_id);
$customers = getActiveCustomers();
$preference = getPreference($invoice['preference_id']);
$billers = getActiveBillers();
$defaults = getSystemDefaults();

$preferences = getActivePreferences();
$currencys_note = getActiveCurrencysNote();
$trading_types = getActiveTradingTypes();

$smarty -> assign("invoice",$invoice);
$smarty -> assign("defaults",$defaults);
$smarty -> assign("invoiceItems",$invoiceItems);
$smarty -> assign("customers",$customers);
$smarty -> assign("preference",$preference);
$smarty -> assign("billers",$billers);
$smarty -> assign("preferences",$preferences);
$smarty -> assign("lines",count($invoiceItems));
$smarty -> assign("currencys_note",$currencys_note);
$smarty -> assign("trading_types",$trading_types);

$smarty -> assign('pageActive', 'invoice');
$smarty -> assign('subPageActive', 'invoice_edit');
$smarty -> assign('active_tab', '#invoice');
?>
