<?php

if($_GET['id'])
{
	$sql = sprintf('SELECT * FROM me_province WHERE id = %d LIMIT 1', $_GET['id']);
	$states = dbQuery($sql);
	if($states->rowCount() > 0)
	{	
		$row = $states->fetch();
		$output['name'] = $row['name'];
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
