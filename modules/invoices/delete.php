<?php
checkLogin();

#get the invoice id
$invoice_id = $_GET['id'];
$invoice = getInvoice($invoice_id);
$preference = getPreference($invoice['preference_id']);
$defaults = getSystemDefaults();
$invoiceItems = invoice::getInvoiceItems($invoice_id);

$smarty -> assign("invoice",$invoice);
$smarty -> assign("preference",$preference);
$smarty -> assign("defaults",$defaults);
$smarty -> assign("invoiceItems",$invoiceItems);

/*If delete is disabled - dont allow people to view this page*/
if ( $defaults['delete'] == 'N' ) {
	die('Invoice deletion has been disabled, you are not supposed to be here');
}


if ( ($_GET['stage'] == 2 ) AND ($_POST['doDelete'] == 'y') ) {
	global $dbh;

	$dbh->beginTransaction();
	$error = false;

    
//delete line item taxes
$invoice_line_items = invoice::getInvoiceItems($invoice_id);
foreach( $invoice_line_items as $key => $value)
{
            
	//echo "line item id: ".$invoice_line_items[$key]['id']."<br />";
        delete('invoice_item_tax','invoice_item_id',$invoice_line_items[$key]['id']);
}
    
//Update Currency Note When Delete This Invoice(Refund)
foreach( $invoiceItems as $key => $value)
{
delInvoicesUpdateCurrencyNote($invoiceItems[$key]['trading_type_id'],$invoiceItems[$key]['product_id'],$invoiceItems[$key]['quantity'],$invoiceItems[$key]['unit_price'],$invoiceItems[$key]['note_cost']);  
}

// Start by deleting the line items
if (! delete('invoice_items','invoice_id',$invoice_id)) {
	$error = true;
}

//delete the info from the invoice table
if ($error || ! delete('invoices','id',$invoice_id)) {
	$error = true;
} 

if ($error) {
	$dbh->rollBack();
} 

else {
	$dbh->commit();
}
//TODO - what about the stuff in the products table for the total style invoices?
echo "<meta http-equiv='refresh' content='2;URL=index.php?module=invoices&view=manage' />";

}

$smarty -> assign('pageActive', 'invoice');
$smarty -> assign('active_tab', '#invoice');
?>
