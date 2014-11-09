<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert currencey_note
$saved = false;

if (  $op === 'insert_currency_note' ) {
	
	if($id = insertCurrencyNote()) {
 		$saved = true;
 	}
}

if ($op === 'edit_currency_note' ) {
	if (isset($_POST['save_currency_note']) && updateCurrencyNote()) {
		$saved = true;
	}
}




$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$smarty->assign('saved',$saved);

$smarty -> assign('pageActive', 'currencys_note');
$smarty -> assign('active_tab', '#product');
?>
