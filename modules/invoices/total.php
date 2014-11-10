<?php
checkLogin();

$pageActive = "invoices";
$smarty->assign('pageActive', $pageActive);

include('./modules/invoices/invoice.php');

$smarty -> assign('pageActive', 'invoice_new');
$smarty -> assign('subPageActive', 'invoice_new_total');
$smarty -> assign('active_tab', '#invoice');
?>