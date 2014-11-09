<?php
header("Content-type: text/html; charset=utf-8");
mysql_query("set names utf8");
checkLogin();

$updated = false;
if(updateCurrencysCnyRate());
$updated = true;

$smarty->assign('updated',$updated);
$smarty -> assign('pageActive', 'currencys_cny');
$smarty -> assign('active_tab', '#product');
?>