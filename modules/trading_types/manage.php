<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$trading_types = getTradingTypes();

$smarty -> assign('trading_types',$trading_types);

$smarty -> assign('pageActive', 'trading_type');
$smarty -> assign('active_tab', '#setting');
?>