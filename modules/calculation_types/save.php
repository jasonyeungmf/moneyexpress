<?php


//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;

if (  $op === 'insert_calculation_type' ) {
	if ($db_server == 'pgsql') {
		$sql = "INSERT into ".TB_PREFIX."calculation_types
				(domain_id, description, enabled)
			VALUES
				(:domain_id', :description, :enabled)";
	} else {
		$sql = "INSERT into
				".TB_PREFIX."calculation_types
			VALUES
				(NULL, :domain_id, :description, :enabled)";
	}
	
	if (dbQuery($sql, ':domain_id', $auth_session->domain_id, ':description', $_POST['description'], ':enabled', $_POST['enabled'])) {
		$saved = true;
	} else {
		$saved = false;
	}
}

else if (  $op === 'edit_calculation_type' ) {
	if (isset($_POST['save_calculation_type'])) {
		$sql = "UPDATE
				".TB_PREFIX."calculation_types
			SET
				description = :description,
				enabled = :enabled
			WHERE
				id = :id";

		if (dbQuery($sql, ':description', $_POST['description'], ':enabled', $_POST['enabled'], ':id', $_GET['id'])) {
			$saved = true;
		} else {
			$saved = false;
		}
	} 
}
$smarty -> assign('saved',$saved); 

$smarty -> assign('pageActive', 'calculation_type');
$smarty -> assign('active_tab', '#setting');
?>
