<?php

header("Content-type: text/xml");

$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
$dir = (isset($_POST['sortorder'])) ? $_POST['sortorder'] : "ASC" ;
$sort = (isset($_POST['sortname'])) ? $_POST['sortname'] : "cf_id" ;
$limit = (isset($_POST['rp'])) ? $_POST['rp'] : "25" ;
$page = (isset($_POST['page'])) ? $_POST['page'] : "1" ;

$xml = "";

//SC: Safety checking values that will be directly subbed in
if (intval($start) != $start) {
	$start = 0;
}
if (intval($limit) != $limit) {
	$limit = 25;
}
if (!preg_match('/^(asc|desc)$/iD', $dir)) {
	$dir = 'ASC';
}

//$query = $_POST['query'];
//$qtype = $_POST['qtype'];

$where = " WHERE domain_id = :domain_id";
//if ($query) $where = " WHERE domain_id = :domain_id AND $qtype LIKE '%$query%' ";


/*Check that the sort field is OK*/
$validFields = array('cf_id', 'cf_custom_label','enabled');

if (in_array($sort, $validFields)) {
	$sort = $sort;
} else {
	$sort = "cf_id";
}

	$sql = "SELECT 
				cf_id,
				cf_custom_field,
				cf_custom_label
			FROM 
				".TB_PREFIX."custom_fields
			$where
			ORDER BY 
				$sort $dir 
			LIMIT 
				$start, $limit";
			
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(end($dbh->errorInfo()));
	$count = $sth->rowCount();
	
	$cfs = null;

	$number_of_rows = 0;
	for($i=0; $cf = $sth->fetch();$i++) {
		$cfs[$i] = $cf;
		$cfs[$i]['cf_custom_field'] = $cf['cf_custom_field'];
		$number_of_rows = $i;
	}
	
	$xml .= "<rows>";
	$xml .= "<page>$page</page>";
	$xml .= "<total>$count</total>";
	
	foreach ($cfs as $row) 
	{
		$xml .= "<row id='".htmlsafe($row['cf_id'])."'>";
		$xml .= "<cell><![CDATA[
			<a class='index_table' title='$LANG[view] $LANG[custom_field] ".htmlsafe($row['cf_custom_field'])."' href='index.php?module=custom_fields&view=details&id=$row[cf_id]&action=view'><img src='images/common/view.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
			<a class='index_table' title='$LANG[edit] $LANG[custom_field] ".htmlsafe($row['cf_custom_field'])."' href='index.php?module=custom_fields&view=details&id=$row[cf_id]&action=edit'><img src='images/common/edit.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
		]]></cell>";
		$xml .= "<cell><![CDATA[".htmlsafe($row['cf_id'])."]]></cell>";		
		$xml .= "<cell><![CDATA[".htmlsafe($row['cf_custom_field'])."]]></cell>";
		$xml .= "<cell><![CDATA[".htmlsafe($row['cf_custom_label'])."]]></cell>";				
		$xml .= "</row>";		
	}
	
	$xml .= "</rows>";

echo $xml;
?> 
