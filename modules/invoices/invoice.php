<?php
checkLogin();
$billers = getActiveBillers();
$customers = getActiveCustomers();
$preferences = getActivePreferences();
$defaults = getSystemDefaults();
$currencys_note = getActiveCurrencysNote();
$trading_types = getActiveTradingTypes();

if ($billers == null OR $customers == null OR $preferences == null)
{
    $first_run_wizard =true;
    $smarty -> assign("first_run_wizard",$first_run_wizard);
}

$defaults['trading_type'] = (isset($_GET['trading_type'])) ? $_GET['trading_type'] : $defaults['trading_type'];
$defaults['biller'] = (isset($_GET['biller'])) ? $_GET['biller'] : $defaults['biller'];
$defaults['customer'] = (isset($_GET['customer'])) ? $_GET['customer'] : $defaults['customer'];
$defaults['preference'] = (isset($_GET['preference'])) ? $_GET['preference'] : $defaults['preference'];
$defaultPreference = getDefaultPreference();

if (!empty( $_GET['line_items'] )) {
	$dynamic_line_items = $_GET['line_items'];
} 
else {
	$dynamic_line_items = $defaults['line_items'] ;
}

$smarty -> assign("billers",$billers);
$smarty -> assign("customers",$customers);
$smarty -> assign("preferences",$preferences);
$smarty -> assign("dynamic_line_items",$dynamic_line_items);
$smarty -> assign("currencys_note",$currencys_note);
$smarty -> assign("trading_types",$trading_types);

$smarty -> assign("defaultCustomerID",$defaultCustomerID['id']);
$smarty -> assign("defaults",$defaults);

$smarty -> assign('active_tab', '#invoice');

?>
