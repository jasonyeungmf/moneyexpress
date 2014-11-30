<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$calculation_types = getCalculationTypes();

$smarty -> assign('calculation_types',$calculation_types);

$smarty -> assign('pageActive', 'calculation_type');
$smarty -> assign('active_tab', '#setting');
?>