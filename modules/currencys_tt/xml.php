<?php

header("Content-type: text/xml");
mysql_query("SET NAMES 'utf8'");

//$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
$dir = (isset($_POST['sortorder'])) ? $_POST['sortorder'] : "ASC" ;
$sort = (isset($_POST['sortname'])) ? $_POST['sortname'] : "id" ;
$rp = (isset($_POST['rp'])) ? $_POST['rp'] : "40" ;
$page = (isset($_POST['page'])) ? $_POST['page'] : "1" ;



$defaults = getSystemDefaults();
$smarty -> assign("defaults",$defaults);

$currencys_tt = new currencytt();
$sth = $currencys_tt->select_all('', $dir, $sort, $rp, $page);
$sth_count_rows = $currencys_tt->select_all('count',$dir, $sort, $rp, $page);

$currencys_tt_all = $sth->fetchAll(PDO::FETCH_ASSOC);

$count = $sth_count_rows->rowCount();




//echo sql2xml($customers, $count);
$xml .= "<rows>";

$xml .= "<page>$page</page>";

$xml .= "<total>$count</total>";

foreach ($currencys_tt_all as $row) {

	$xml .= "<row id='".$row['iso']."'>";
	$xml .= "<cell><![CDATA[
			<a class='index_table' title='$LANG[view] ".$row['id']."' href='index.php?module=currencys_tt&view=details&id=".$row['id']."&action=view'><img src='images/common/view.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
			<a class='index_table' title='$LANG[edit] ".$row['id']."' href='index.php?module=currencys_tt&view=details&id=".$row['id']."&action=edit'><img src='images/common/edit.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
		]]></cell>";
	$xml .= "<cell><![CDATA[".$row['id']."]]></cell>";		
	$xml .= "<cell><![CDATA[<img src='images/flag/".$row['country']."' alt='".$row['country']."' title='".$row['code']."' />]]></cell>";
	$xml .= "<cell><![CDATA[<img src='images/symbol/".$row['symbol']."' height='17' alt='".$row['symbol']."' title='".$row['code']."' />]]></cell>";
	$xml .= "<cell><![CDATA[".$row['currency_en']."]]></cell>";
	$xml .= "<cell><![CDATA[".$row['currency_local']."]]></cell>";
	$xml .= "<cell><![CDATA[".$row['code']."]]></cell>";
	$xml .= "<cell><![CDATA[".$row['tt_sell']."]]></cell>";
	$xml .= "<cell><![CDATA[".$row['tt_buy']."]]></cell>";

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
