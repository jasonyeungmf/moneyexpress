<?php
checkLogin();

# Deal with op and add some basic sanity checking
$customer_no = $_GET['customer_no'];

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;

#insert customer

$saved = false;

if ($op === "insert_customer") {

	if (insertCustomer()) {
		$saved = true;
	}
}

if ( $op === 'edit_customer' ) {

	if (isset($_POST['save_customer'])) {
		
		if (updateCustomer()) {

			$saved = true;
		}
	}
}

$smarty -> assign('saved',$saved);
$smarty -> assign('customer_no',$customer_no); 

$smarty -> assign('pageActive', 'customer');
$smarty -> assign('active_tab', '#people');
?>
