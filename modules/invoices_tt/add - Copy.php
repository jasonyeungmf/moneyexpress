<?php
/*
* Script: itemised.php
* 	itemised invoice page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$serial_no = $_GET['serial_no'];
$account = getAccount($serial_no);
$customer = getCustomer($account['customer_no']);

if($account['customer_no'] != "1")
{
	//Hide id number
	if($customer["id_no"] == ""){
		$id_no = "";
	}
	if($customer["id_no"] != ""){
		$id_no = "(ID)";
	}
$customer_detail = $customer['name']."-".$customer['attention']."-".$id_no."-".$customer['mobile_phone']."-".$customer['phone']."-".$customer['fax'];
}

if($invoice['customer_id'] == "1")
{
	$customer_detail = $account['name'];
}			

$logger->log('invoice created', Zend_Log::INFO);
include('./modules/invoices_tt/invoice.php');

$smarty -> assign('serial_no', $serial_no);
$smarty -> assign('account', $account);
$smarty -> assign('customer', $customer);
$smarty -> assign('customer_detail', $customer_detail);

$pageActive = "invoice_tt";
$smarty -> assign('pageActive', $pageActive);
$smarty -> assign('subPageActive', 'invoice_tt_new');
$smarty -> assign('active_tab', '#invoice');
?>