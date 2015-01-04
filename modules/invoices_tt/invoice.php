<?php
checkLogin();

$accounts = getActiveAccounts();
$billers = getActiveBillers();
$customers = getActiveCustomers();
$preferences = getActivePreferences();
$defaults = getSystemDefaults();
$currencys_tt = getActiveCurrencysTT();
$trading_types = getActiveTradingTypes();
$payment_types = getActivePaymentTypes();
$calculation_types = getActiveCalculationTypes();

if ($billers==null OR $customers==null OR $currencys_tt==null OR $accounts==null OR $trading_types==null OR $payment_types==null OR $preferences==null)
{
    $first_run_wizard =true;
    $smarty -> assign("first_run_wizard",$first_run_wizard);
}

$defaults['payment_type'] = (isset($_GET['payment_type'])) ? $_GET['payment_type'] : $defaults['payment_type'];
$defaults['trading_type'] = (isset($_GET['trading_type'])) ? $_GET['trading_type'] : $defaults['trading_type'];
$defaults['biller'] = (isset($_GET['biller'])) ? $_GET['biller'] : $defaults['biller'];
$defaults['customer'] = (isset($_GET['customer'])) ? $_GET['customer'] : $defaults['customer'];
$defaults['preference'] = (isset($_GET['preference'])) ? $_GET['preference'] : $defaults['preference'];
$defaultPreference = getDefaultPreference();

$smarty -> assign("accounts",$accounts);
$smarty -> assign("billers",$billers);
$smarty -> assign("customers",$customers);
$smarty -> assign("preferences",$preferences);
$smarty -> assign("currencys_tt",$currencys_tt);
$smarty -> assign("trading_types",$trading_types);
$smarty -> assign("payment_types",$payment_types);
$smarty -> assign("calculation_types",$calculation_types);
$smarty -> assign("defaultCustomerID",$defaultCustomerID['id']);
$smarty -> assign("defaults",$defaults);

$smarty -> assign('active_tab', '#invoice');

?>