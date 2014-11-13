<?php

if($_GET['id'])
{
	$sql = sprintf('SELECT * FROM me_currencys_tt WHERE id = %d LIMIT 1', $_GET['id']);
	$states = dbQuery($sql);
	if($states->rowCount() > 0)
	{	
		$row = $states->fetch();
		$output['tt_sell'] = $row['tt_sell'];
		$output['tt_buy'] = $row['tt_buy'];
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
