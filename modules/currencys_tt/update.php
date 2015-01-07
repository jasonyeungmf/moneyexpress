<?php
header("Content-type: text/html; charset=utf-8");
mysql_query("set names utf8");
checkLogin();

$updated = false;
if(updateCurrencysTTRate());
$updated = true;

$smarty->assign('updated',$updated);
$smarty -> assign('pageActive', 'update_tt');
$smarty -> assign('active_tab', '#currency');
?>