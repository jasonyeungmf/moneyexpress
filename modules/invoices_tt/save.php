<?php
checkLogin();

$smarty -> assign('pageActive', 'invoice_tt_new');
$smarty -> assign('active_tab', '#invoice');

if(!isset($_POST['action'])) 
{
	exit("no save action");
}
$saved = false;

if($_POST['action'] == "insert") 
{
	if(insertInvoiceTT())
	{
		$id = lastInsertIdTT();
		$saved = true;
	}
} 

elseif($_POST['action'] == "edit") 
{
	$id = $_POST['id'];
	if(updateInvoiceTT($_POST['id'])) 
	{
		$saved = true;
	}
}

$smarty->assign('saved', $saved);
$smarty->assign('id', $id);

?>
