<?php
checkLogin();

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;

$saved = false;

if ( $op === 'insert_account') {
	
	if($id = insertAccount()) {
 		$saved = true;
 	}
}

if ($op === 'edit_account' ) {
	if (isset($_POST['save_account']) && updateAccount()) {
		$saved = true;
	}
}


$smarty -> assign('saved',$saved);
$smarty -> assign('pageActive', 'account');
$smarty -> assign('active_tab', '#account');
