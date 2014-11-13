<?php

if($_GET['id'])
{
	$sql = sprintf('SELECT * FROM me_accounts WHERE serial_no = %d LIMIT 1', $_GET['id']);
	$states = dbQuery($sql);
	if($states->rowCount() > 0)
	{	
		$row = $states->fetch();
		$output['customer_no'] = $row['customer_no'];
		$output['name'] = $row['name'];
		$output['payee'] = $row['payee'];
		$output['bank'] = $row['bank'];
		$output['account_no'] = $row['account_no'];
	}
	else
	{
		$output .= '';
	}

		echo json_encode($output);
	
	exit();
}

else
{
	echo "";
}

?>
