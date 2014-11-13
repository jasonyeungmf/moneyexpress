<?php
header("Content-type: text/html; charset=utf-8");
mysql_query("set names utf8");
checkLogin();

$import = false;
if(importFromExcel())
{
	$import = true;
}

$smarty->assign('updated',$updated);
$smarty -> assign('pageActive', 'customers');
$smarty -> assign('active_tab', '#peopel');
?>