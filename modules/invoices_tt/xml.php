<?php

header("Content-type: text/xml");

//$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
$dir = (isset($_POST['sortorder'])) ? $_POST['sortorder'] : "DESC" ;
$sort = (isset($_POST['sortname'])) ? $_POST['sortname'] : "id" ;
$rp = (isset($_POST['rp'])) ? $_POST['rp'] : "25" ;
$having = (isset($_GET['having'])) ? $_GET['having'] : "" ;
$page = (isset($_POST['page'])) ? $_POST['page'] : "1" ;

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

//$sql = "SELECT * FROM ".TB_PREFIX."invoices LIMIT $start, $limit";
$invoice = new invoicett();
$invoice->sort=$sort;
$invoice->query=$_REQUEST['query'];
$invoice->qtype=$_REQUEST['qtype'];
$invoice->sort=$sort;
$invoice->start_date = $start_date;
$invoice->end_date = $end_date;

$sth = $invoice->select_all('', $dir, $rp, $page, $having);
$sth_count_rows = $invoice->select_all('count',$dir, $rp, $page, $having);

$invoices = $sth->fetchAll(PDO::FETCH_ASSOC);

$xml ="";
$count = $sth_count_rows->rowCount();

	$xml .= "<rows>";
	$xml .= "<page>$page</page>";
	$xml .= "<total>$count</total>";
	
	foreach ($invoices as $row) {
		$xml .= "<row id='".$row['id']."'>";
		$xml .= "<cell>
		<![CDATA[<a class='index_table' title=' ".$LANG['quick_view_tooltip']." ".$row['preference']." ".$row['id']."' href='index.php?module=invoices_tt&view=quick_view&id=".$row['id']."'> 
			<img src='images/common/view.png' class='action' />
		</a>
		
		<a class='index_table' title=' ".$LANG['edit_view_tooltip']." ".$row['preference']." ".$row['id']."' href='index.php?module=invoices_tt&view=details&id=".$row['id']."&action=view'>
			<img src='images/common/edit.png' class='action' />
		</a>
		
		<a class='index_table' title=' ".$LANG['print_preview_tooltip']." ".$row['preference']." ".$row['id']."' href='index.php?module=export&view=invoice_tt&id=".$row['id']."&format=print' target='_blank'>
			<img src='images/common/printer.png' class='action' />
		</a>
		
		<a title=' ".$LANG['export_tooltip']." ".$row['preference']." ".$row['id']."' class='invoicett_export_dialog' href='#' rel='".$row['id']."'>
			<img src='images/common/page_white_acrobat.png' class='action' />
		</a>
		
		<a title=' ".$LANG['email']." ".$row['preference']." ".$row['id']."' class='index_table' href='index.php?module=invoices_tt&view=email&stage=1&id=".$row['id']."'>
			<img src='images/common/mail-message-new.png' class='action' />
		</a>

		<a class='index_table' title=' ".$LANG['delete']." ".$row['preference']." ".$row['id']."' href='index.php?module=invoices_tt&view=delete&stage=1&id=".$row['id']."'>
			<img src='images/common/delete_item.png' height='16' border='-5px' padding='-4px' valign='bottom' />
		</a>
		]]></cell>";
		$xml .= "<cell><![CDATA[".$row['id']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['date']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['index_id']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['biller']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['customer_id']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['customer_detail']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['customer_detail_2']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['account_detail']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['trading_type']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['payment_type']."]]></cell>";
		$xml .= "<cell><![CDATA[".siLocal::number_trim($row['quantity'])."]]></cell>";
		$xml .= "<cell><![CDATA[".siLocal::number_clean($row['unit_price'])."]]></cell>";
		$xml .= "<cell><![CDATA[".siLocal::number_trim($row['charge'])."]]></cell>";
		$xml .= "<cell><![CDATA[".siLocal::number_trim($row['total'])."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['currency']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['calculation_type']."]]></cell>";
		$xml .= "<cell><![CDATA[".siLocal::number_trim($row['payable_amount'])."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['spell_number']."]]></cell>";
		$xml .= "<cell><![CDATA[".$row['note']."]]></cell>";		
		$xml .= "<cell><![CDATA[".$row['preference']."]]></cell>";				
		$xml .= "</row>";		
	}
	$xml .= "</rows>";

echo $xml;
?> 
