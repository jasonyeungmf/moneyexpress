<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

//TODO
jsBegin();
jsFormValidationBegin("frmpost");
jsValidateRequired("description",$LANG['trading_type_description']);
jsFormValidationEnd();
jsEnd();


#get the invoice id
$trading_type_id = $_GET['id'];

$trading_type = getTradingType($trading_type_id);

$smarty->assign('trading_type',$trading_type);

$smarty -> assign('pageActive', 'trading_type');
$subPageActive = $_GET['action'] =="view"  ? "trading_types_view" : "trading_types_edit" ;
$smarty -> assign('subPageActive', $subPageActive);
$smarty -> assign('active_tab', '#setting');
?>
