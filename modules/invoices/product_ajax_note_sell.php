<?php

if($_GET['id'])
{
	$sql = sprintf('SELECT note_sell,note_cost FROM me_currencys_note WHERE id = %d LIMIT 1', $_GET['id']);
	$states = dbQuery($sql);
	if($states->rowCount() > 0)
	{	
		$row = $states->fetch();
			$output['unit_price'] = $row['note_sell'];
			$output['note_cost'] = $row['note_cost'];
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
