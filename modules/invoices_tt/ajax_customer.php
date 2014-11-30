<?php

if($_GET['id'])
{
	$sql = sprintf('SELECT * FROM me_customers WHERE customer_no = %d LIMIT 1', $_GET['id']);
	$states = dbQuery($sql);
	if($states->rowCount() > 0)
	{	
		$row = $states->fetch();
		$output['name'] = $row['name'];
		$output['attention'] = $row['attention'];
		$output['id_no'] = $row['id_no'];
		$output['mobile_phone'] = $row['mobile_phone'];
		$output['phone'] = $row['phone'];
		$output['fax'] = $row['fax'];
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
