<?php

checkLogin();

#get the invoice id
$invoice_id = $_GET['id'];
$invoice = getInvoiceTT($invoice_id);
$preference = getPreference($invoice['preference_id']);
$defaults = getSystemDefaults();

$smarty -> assign("invoice",$invoice);
$smarty -> assign("preference",$preference);
$smarty -> assign("defaults",$defaults);

/*If delete is disabled - dont allow people to view this page*/
if ( $defaults['delete'] == 'N' ) {
	die('Invoice deletion has been disabled, you are not supposed to be here');
}

if ( ($_GET['stage'] == 2 ) AND ($_POST['doDelete'] == 'y') ) {
	global $dbh;

	$dbh->beginTransaction();
	$error = false;
    
//delete the info from the invoice table
if ($error || ! deleteInvoicesTT('invoices_tt','id',$invoice_id)) {
	$error = true;
} 

if ($error) {
	$dbh->rollBack();
} 

else {
	$dbh->commit();
}

echo "<meta http-equiv='refresh' content='2;URL=index.php?module=invoices_tt&view=manage' />";

}

$smarty -> assign('pageActive', 'invoice_tt');
$smarty -> assign('active_tab', '#invoice');
?>
