<?php
header("Content-type: text/html; charset=utf-8");
mysql_query("set names utf8");
checkLogin();

$updated = false;
if(updateCurrencysNoteRate());
$updated = true;

$smarty->assign('updated',$updated);
$smarty -> assign('pageActive', 'update_note');
$smarty -> assign('active_tab', '#currency');
?>