<?php
checkLogin();

#get the invoice id
$invoice_id = $_GET['id'];
$invoice = getInvoiceTT($invoice_id);
$preference = getPreference($invoice['preference_id']);
$trading_type = getTradingType($invoice['trading_type_id']);
$customer = getCustomer($invoice['customer_id']);
$customer_detail = $customer['name'].'-'.$customer['attention'].'-'.$customer['id_no'].'-'.$customer['mobile_phone'].'-'.$customer['phone'].'-'.$customer['fax'];
$account = getAccount($invoice['account_id']);
$calculation_type = getCalculationType($invoice['calculation_type_id']);

$defaults = getSystemDefaults();
$billers = getActiveBillers();
$customers = getActiveCustomers();
$preferences = getActivePreferences();
$trading_types = getActiveTradingTypes();
$payment_types = getActivePaymentTypes();
$accounts = getActiveAccounts();
$currencys_tt = getActiveCurrencysTT();
$calculation_types = getActiveCalculationTypes();

$smarty -> assign("invoice",$invoice);
$smarty -> assign("preference",$preference);
$smarty -> assign("trading_type",$trading_type);
$smarty -> assign("customer",$customer);
$smarty -> assign("customer_detail",$customer_detail);
$smarty -> assign("account",$account);
$smarty -> assign("calculation_type",$calculation_type);

$smarty -> assign("defaults",$defaults);
$smarty -> assign("billers",$billers);
$smarty -> assign("customers",$customers);
$smarty -> assign("preferences",$preferences);
$smarty -> assign("trading_types",$trading_types);
$smarty -> assign("payment_types",$payment_types);
$smarty -> assign("accounts",$accounts);
$smarty -> assign("currencys_tt",$currencys_tt);
$smarty -> assign("calculation_types",$calculation_types);

$smarty -> assign('pageActive', 'invoice_tt');
$smarty -> assign('subPageActive', 'invoice_tt_edit');
$smarty -> assign('active_tab', '#invoice');
?>