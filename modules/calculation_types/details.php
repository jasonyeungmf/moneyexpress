<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

//TODO
jsBegin();
jsFormValidationBegin("frmpost");
jsValidateRequired("description",$LANG['calculation_type_description']);
jsFormValidationEnd();
jsEnd();


#get id
$calculation_type_id = $_GET['id'];

$calculation_type = getCalculationType($calculation_type_id);

$smarty->assign('calculation_type',$calculation_type);

$smarty -> assign('pageActive', 'calculation_type');
$subPageActive = $_GET['action'] =="view"  ? "calculation_type_view" : "calculation_type_edit" ;
$smarty -> assign('subPageActive', $subPageActive);
$smarty -> assign('active_tab', '#setting');
?>
