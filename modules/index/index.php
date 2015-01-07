<?php

checkLogin();

$accounts = getAccounts();
$billers = getBillers();
$customers = getCustomers();
$preferences = getPreferences();
$defaults = getSystemDefaults();
$currencys_note = getCurrencysNote();
$currencys_tt = getCurrencysTT();
$trading_types = getTradingTypes();

if ($billers == null OR $customers == null OR $preferences == null)
{
    $first_run_wizard =true;
    $smarty -> assign("first_run_wizard",$first_run_wizard);
}

$smarty -> assign("mysql",$mysql);
$smarty -> assign("db_server",$db_server);

$smarty -> assign("billers", $billers);
$smarty -> assign("customers", $customers);
$smarty -> assign("preferences", $preferences);
$smarty -> assign("account", $account);
$smarty -> assign("accounts", $accounts);

$smarty -> assign("currency_note", $currency_note);
$smarty -> assign("currencys_note", $currencys_note);
$smarty -> assign("currency_tt", $currency_tt);
$smarty -> assign("currencys_tt", $currencys_tt);
$smarty -> assign("trading_type", $trading_type);
$smarty -> assign("trading_types", $trading_types);

$smarty -> assign('pageActive', 'dashboard');
$smarty -> assign('active_tab', '#home');
