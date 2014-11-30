<?php
checkLogin();


#get the invoice id
$customer_no = $_GET['customer_no'];
$customer = getCustomer($customer_no);
$customer['wording_for_enabled'] = $customer['enabled']==1?$LANG['enabled']:$LANG['disabled'];


//TODO: Perhaps possible a bit nicer?
$stuff = null;
$stuff['total'] = calc_customer_total_tt($customer['customer_no']);

$customFieldLabel = getCustomFieldLabels();
$invoices = getCustomerInvoicesTT($customer_no);

//$customFieldLabel = getCustomFieldLabels("biller");
$smarty -> assign("stuff",$stuff);
$smarty -> assign('customer',$customer);
$smarty -> assign('invoices',$invoices);
$smarty -> assign('customFieldLabel',$customFieldLabel);

$smarty -> assign('pageActive', 'customer');
$subPageActive = $_GET['action'] =="view"  ? "customer_view" : "customer_edit" ;
$smarty -> assign('subPageActive', $subPageActive);
$smarty -> assign('pageActive', 'customer');


$smarty -> assign('active_tab', '#people');
?>
