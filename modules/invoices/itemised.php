<?php
checkLogin();

$logger->log('Itemised invoice created', Zend_Log::INFO);

include('./modules/invoices/invoice.php');

$pageActive = "invoice";
$smarty -> assign('pageActive', $pageActive);
$smarty -> assign('subPageActive', 'invoice_new');
$smarty -> assign('active_tab', '#invoice');
?>
