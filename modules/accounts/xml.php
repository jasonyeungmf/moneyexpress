<?php
header("Content-type: text/xml;charset=utf8");
mysql_query("SET NAMES 'utf8'");

$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
$dir = (isset($_POST['sortorder'])) ? $_POST['sortorder'] : "ASC" ;
$sort = (isset($_POST['sortname'])) ? $_POST['sortname'] : "serial_no" ;
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
	
	$where = "WHERE a.domain_id = :domain_id";
	
	if ($query) $where = " WHERE a.domain_id = :domain_id AND $qtype LIKE '%$query%' ";
	
	/*exact match search*/
	if( ($_POST['qtype'] == 'a.customer_no') || ($_POST['qtype'] == 'a.serial_no') ){
		if ($query) $where = " WHERE a.domain_id = :domain_id AND $qtype = '$query' ";
	}

	/* multi-field search*/
	if($_POST['qtype'] == 'customer_detail'){
		$qtype1 = "c.name";
		$qtype2 = "c.attention";
		$qtype3 = "c.id_no";
		$qtype4 = "c.mobile_phone";
		$qtype5 = "c.phone";
		$qtype6 = "c.fax";
		$qtype7 = "a.name";
		if ($query) $where = " 	WHERE a.domain_id = :domain_id 
								AND $qtype1 LIKE '%$query%' 
								OR $qtype2 LIKE '%$query%' 
								OR $qtype3 LIKE '%$query%' 
								OR $qtype4 LIKE '%$query%' 
								OR $qtype5 LIKE '%$query%' 
								OR $qtype6 LIKE '%$query%' 
								OR $qtype7 LIKE '%$query%' 
							";
	}

	/*Check that the sort field is OK*/
	$validFields = array('a.customer_no','customer_detail','a.name','a.serial_no','a.payee','a.bank','a.account_no');
	
	if (in_array($sort, $validFields)) {
		$sort = $sort;
	} else {
		$sort = "a.serial_no";
	}
	
	$sql = "SELECT 
				c.customer_no AS c_customer_no,
				c.name AS c_name,
				c.attention AS c_attention,
				c.id_no AS c_id_no,
				c.phone AS c_phone,
				c.mobile_phone AS c_mobile_phone,
				c.fax AS c_fax,
				(SELECT CONCAT(c.name,'-',c.attention,'-',c.id_no,'-',c.mobile_phone,'-',c.phone,'-',c.fax)) AS customer_detail_2,
				(SELECT (CASE   WHEN c_customer_no = 1 THEN '' 
								ELSE customer_detail_2 END)) AS customer_detail,

				a.customer_no AS customer_no,
				a.name AS name,
				a.serial_no AS serial_no,
				a.payee AS payee,
				a.bank AS bank,
				a.account_no AS account_no,
                (SELECT (CASE  WHEN a.enabled = 0 THEN '".$LANG['disabled']."' ELSE '".$LANG['enabled']."' END )) AS enabled
 			FROM 
				".TB_PREFIX."accounts a
				LEFT JOIN ".TB_PREFIX."customers c ON c.customer_no = a.customer_no
			$where
			ORDER BY 
			$sort $dir 
			$limit";
	
	$result = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $result;
		
}	

$sth = sql('', $start, $dir, $sort, $rp, $page);
$sth_count_rows = sql('count', $start, $dir, $sort, $rp, $page);

$accounts = $sth->fetchAll(PDO::FETCH_ASSOC);

$count = $sth_count_rows->rowCount();


	$xml .= "<rows>";
	$xml .= "<page>$page</page>";
	$xml .= "<total>$count</total>";
	
	foreach ($accounts as $row) {
		
		$xml .= "<row serial_no='".$row['serial_no']."'>";
		//$customer_detail = $row['c_name'].'-'.$row['c_attention'].'-'.$row['c_id_no'].'-'.$row['c_mobile_phone'].'-'.$row['c_phone'].'-'.$row['c_fax'];
		$xml .= "<cell><![CDATA[
			<a class='index_table' title='$LANG[view] $LANG[serial_no] ".$row['serial_no']."' href='index.php?module=accounts&view=details&serial_no=$row[serial_no]&action=view'>
				<img src='images/common/view.png' height='16' border='-5px' padding='-4px' valign='bottom' />
			</a>

			<a class='index_table' title='$LANG[edit] $LANG[serial_no] ".$row['serial_no']."' href='index.php?module=accounts&view=details&serial_no=$row[serial_no]&action=edit'>
				<img src='images/common/edit.png' height='16' border='-5px' padding='-4px' valign='bottom' />
			</a>

			<a class='index_table' title='$LANG[add_to_invoice] $LANG[serial_no] ".$row['serial_no']."' href='index.php?module=invoices_tt&view=add&serial_no=$row[serial_no]' target='_blank'>
				<img src='images/common/add.png' height='16' border='-5px' padding='-4px' valign='bottom' />
			</a>

            <a class='index_table' title='$LANG[delete] $LANG[serial_no] ".$row['serial_no']."' href='index.php?module=accounts&view=delete&stage=1&serial_no=$row[serial_no]'>
            	<img src='images/common/delete_item.png' height='16' border='-5px' padding='-4px' valign='bottom' />
            </a>
		]]></cell>";		
		$xml .= "<cell><![CDATA[".$row['customer_no']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['customer_detail']."]]></cell>";
        $xml .= "<cell><![CDATA[".$row['name']."]]></cell>";
        $xml .= "<cell><![CDATA[".$row['serial_no']."]]></cell>";
        $xml .= "<cell><![CDATA[".$row['payee']."]]></cell>";
        $xml .= "<cell><![CDATA[".$row['bank']."]]></cell>";
        $xml .= "<cell><![CDATA[".$row['account_no']."]]></cell>";
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