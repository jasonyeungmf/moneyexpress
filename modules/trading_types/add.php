<?php


//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


$smarty -> assign('pageActive', 'trading_type');
$smarty -> assign('subPageActive', 'trading_types_add');
$smarty -> assign('active_tab', '#setting');
?>
