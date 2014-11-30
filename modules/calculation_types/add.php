<?php


//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$smarty -> assign('pageActive', 'calculation_type');
$smarty -> assign('subPageActive', 'calculation_type_add');
$smarty -> assign('active_tab', '#setting');
?>
