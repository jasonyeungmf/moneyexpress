<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert currencey_tt
$saved = false;

if (  $op === 'insert_currency_cny' ) {
	
	if($id = insertCurrencyCny()) {
 		$saved = true;
 	}
}

if ($op === 'edit_currency_cny' ) {
	if (isset($_POST['save_currency_cny']) && updateCurrencyCny()) {
		$saved = true;
	}
}
$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';

$smarty->assign('saved',$saved);

$smarty -> assign('pageActive', 'currencys_cny');
$smarty -> assign('active_tab', '#product');
?>
