<?php

header("Content-type: text/xml");

//global $auth_session;
//global $dbh;

$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
$dir = (isset($_POST['sortorder'])) ? $_POST['sortorder'] : "ASC" ;
$sort = (isset($_POST['sortname'])) ? $_POST['sortname'] : "customer_no" ;
$rp = (isset($_POST['rp'])) ? $_POST['rp'] : "25" ;
$page = (isset($_POST['page'])) ? $_POST['page'] : "1" ;

$xml ="";

function sql($type='', $start, $dir, $sort, $rp, $page )
{
	global $config;
	global $LANG;
	global $auth_session;

		
	//SC: Safety checking values that will be directly subbed in
	if (intval($page) != $page) {
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
		$limit;
	}
	/*SQL Limit - end*/	
	
	
	if (!preg_match('/^(asc|desc)$/iD', $dir)) {
		$dir = 'DESC';
	}
	
	$query = $_POST['query'];
	$qtype = $_POST['qtype'];
	
	$where = "  WHERE c.domain_id = :domain_id";
	if ($query) $where = " WHERE c.domain_id = :domain_id AND $qtype LIKE '%$query%' ";
	
	/*exact match search*/
	if($_POST['qtype'] == 'customer_no'){
		if ($query) $where = " WHERE c.domain_id = :domain_id AND $qtype = '$query' ";
	}

	/* multi-field search*/
	if($_POST['qtype'] == 'address'){
		$qtype1 = "street_address";
		$qtype2 = "street_address2";
		$qtype3 = "city";
		$qtype4 = "state";
		$qtype5 = "zip_code";
		$qtype6 = "country";
		if ($query) $where = " WHERE c.domain_id = :domain_id AND $qtype1 LIKE '%$query%' OR $qtype2 LIKE '%$query%' OR $qtype3 LIKE '%$query%' OR $qtype4 LIKE '%$query%' OR $qtype5 LIKE '%$query%' OR $qtype6 LIKE '%$query%'";
	}

	/* multi-field search*/
	if($_POST['qtype'] == 'name_attn'){
		$qtype1 = "name";
		$qtype2 = "attention";
		if ($query) $where = " WHERE c.domain_id = :domain_id AND $qtype1 LIKE '%$query%' OR $qtype2 LIKE '%$query%' ";
	}

	/* multi-field search*/
	if($_POST['qtype'] == 'mobile_phone_fax'){
		$qtype1 = "mobile_phone";
		$qtype2 = "phone";
		$qtype3 = "fax";
		if ($query) $where = " WHERE c.domain_id = :domain_id AND $qtype1 LIKE '%$query%' OR $qtype2 LIKE '%$query%' OR $qtype3 LIKE '%$query%'";
	}

	
	/*Check that the sort field is OK*/
	$validFields = array(
		'customer_no', 
		'id_document', 
		'name_attn',
		'id_no',
		'mobile_phone_fax',
		'email',
		'notes',
		'address',
		'customer_total',
		'enabled');
	
	if (in_array($sort, $validFields)) {
		$sort = $sort;
	} 
	else {
		$sort = "customer_no";
	}
	
		//$sql = "SELECT * FROM ".TB_PREFIX."customers ORDER BY $sort $dir LIMIT $start, $limit";
		$sql = "SELECT 
					c.customer_no as customer_no, 
					c.id_document as id_document, 
					c.name as name,
					c.attention as attention, 
					(SELECT CONCAT(name,' ',attention)) AS name_attn,
					c.id_no as id_no,
					c.mobile_phone as mobile_phone,
					c.phone as phone,
					c.fax as fax,
					(SELECT CONCAT(mobile_phone,'/',phone,'/',fax)) AS mobile_phone_fax,
					c.email as email,
					c.notes as notes,
					c.street_address as street_address,
					c.street_address2 as street_address2,
					c.city as city,
					c.state as state,
					c.zip_code as zip_code,
					c.country as country,
					(SELECT CONCAT(street_address,' ',street_address2,' ',city,' ',state,' ',zip_code,' ',country)) AS address,
					(SELECT (CASE WHEN c.enabled = 0 THEN '".$LANG['disabled']."' ELSE '".$LANG['enabled']."' END )) AS enabled,
					(SELECT coalesce(sum(iv.total),0) FROM ".TB_PREFIX."invoices_tt iv WHERE iv.customer_id = c.customer_no) as customer_total
	                
				FROM 
					".TB_PREFIX."customers c
				$where
				ORDER BY 
					$sort $dir 
				$limit";
	
		$result = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
		return $result;
		
}	

$sth = sql('', $start, $dir, $sort, $rp, $page);
$sth_count_rows = sql('count', $start, $dir, $sort, $rp, $page);

$customers = $sth->fetchAll(PDO::FETCH_ASSOC);

$count = $sth_count_rows->rowCount();


	$xml .= "<rows>";
	$xml .= "<page>$page</page>";
	$xml .= "<total>$count</total>";
	
	foreach ($customers as $row) {
		$xml .= "<row customer_no='".$row['customer_no']."'>";
		$xml .= "<cell><![CDATA[
			<a class='index_table' title='$LANG[view] $LANG[customer] ".$row['name']."' href='index.php?module=customers&view=details&customer_no=$row[customer_no]&action=view'><img src='images/common/view.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
			<a class='index_table' title='$LANG[edit] $LANG[customer] ".$row['name']."' href='index.php?module=customers&view=details&customer_no=$row[customer_no]&action=edit'><img src='images/common/edit.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
		]]></cell>";
		$xml .= "<cell><![CDATA[".$row['customer_no']."]]></cell>";
		$xml .= "<cell><![CDATA[<img src='images/id_document/".$row['id_document']."' height='17' alt='".$row['id_document']."'/>]]></cell>";
		$xml .= "<cell><![CDATA[".$row['name_attn']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['id_no']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['mobile_phone_fax']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['email']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['address']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['notes']."]]></cell>";
		$xml .= "<cell><![CDATA[".siLocal::number_trim($row['customer_total'])."]]></cell>";
		if ($row['enabled']==$LANG['enabled']) {
			$xml .= "<cell><![CDATA[<img src='images/common/tick.png' alt='".$row['enabled']."' title='".$row['enabled']."' />]]></cell>";				
		}	
		else {
			$xml .= "<cell><![CDATA[<img src='images/common/cross.png' alt='".$row['enabled']."' title='".$row['enabled']."' />]]></cell>";				
		}
		$xml .= "</row>";		
	}
	$xml .= "</rows>";

echo $xml;
?> 