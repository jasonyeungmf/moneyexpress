<?php

header("Content-type: text/xml");

$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
$dir = (isset($_POST['sortorder'])) ? $_POST['sortorder'] : "ASC" ;
$sort = (isset($_POST['sortname'])) ? $_POST['sortname'] : "cf_id" ;
$rp = (isset($_POST['rp'])) ? $_POST['rp'] : "25" ;
$page = (isset($_POST['page'])) ? $_POST['page'] : "1" ;

$xml ="";

function sql($type='', $start, $dir, $sort, $rp, $page )
{
	global $config;
	global $LANG;
	global $auth_session;
	
	//SC: Safety checking values that will be directly subbed in
	if (intval($start) != $start) {
		$start = 0;
	}
	if (intval($rp) != $rp) {
		$rp = 25;
	}
	
	/*SQL Limit - start*/
	$start = (($page-1) * $rp);
	$limit = "LIMIT $start, $rp";

	if($type =="count")
	{
		unset($limit);
		$limit="";
	}
	/*SQL Limit - end*/	
	
	if (!preg_match('/^(asc|desc)$/iD', $dir)) {
		$dir = 'ASC';
	}
	
	$query = $_POST['query'];
	$qtype = $_POST['qtype'];
	
	$where = " WHERE domain_id = :domain_id";
	if ($query) $where = " WHERE domain_id = :domain_id AND $qtype LIKE '%$query%' ";
	
	
	
	/*Check that the sort field is OK*/
	$validFields = array('cf_id', 'cf_custom_label','cf_custom_label');
	
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
				$limit";
	
		$result = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
		return $result;
}

$sth = sql('', $start,  $dir, $sort, $rp, $page);
$sth_count_rows = sql('count',$start, $dir, $sort, $rp, $page);

$custom_fields = $sth->fetchAll(PDO::FETCH_ASSOC);

$count = $sth_count_rows->rowCount();

//echo sql2xml($customers, $count);
$xml .= "<rows>";
$xml .= "<page>$page</page>";
$xml .= "<total>$count</total>";

foreach ($custom_fields as $row) 
{
	$xml .= "<row id='".$row['cf_id']."'>";
		$xml .= "<cell><![CDATA[
			<a class='index_table' title='$LANG[view] $LANG[custom_field] ".$row['cf_custom_field']."' href='index.php?module=custom_fields&view=details&id=$row[cf_id]&action=view'><img src='images/common/view.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
			<a class='index_table' title='$LANG[edit] $LANG[custom_field] ".$row['cf_custom_field']."' href='index.php?module=custom_fields&view=details&id=$row[cf_id]&action=edit'><img src='images/common/edit.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
		]]></cell>";
		$xml .= "<cell><![CDATA[".$row['cf_id']."]]></cell>";		
		$xml .= "<cell><![CDATA[".$row['cf_custom_field']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['cf_custom_label']."]]></cell>";				
		$xml .= "</row>";			
}

$xml .= "</rows>";
echo $xml;

?> 