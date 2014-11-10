<?php
checkLogin();

$sql = "SELECT count(*) as count FROM ".TB_PREFIX."invoices";
$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
$number_of_invoices  = $sth->fetch(PDO::FETCH_ASSOC);

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$smarty -> assign('start_date', $start_date);
$smarty -> assign('end_date', $end_date);

//all funky xml - sql stuff done in xml.php

$pageActive = "invoice";

//$smarty -> assign("invoices",$invoices);
$smarty -> assign("number_of_invoices",$number_of_invoices);

$smarty -> assign('pageActive', $pageActive);
$smarty -> assign('active_tab', '#invoice');

$having="";
if(isset($_GET['having']))
{
$having = "&having=".$_GET['having'];
}

if(isset($_GET['having'],$_GET['start_date'],$_GET['end_date']))
{
$having = "&having=".$_GET['having'];
$start_date2 = "&start_date=".$_GET['start_date'];
$end_date2 = "&end_date=".$_GET['end_date'];
}
$url =  'index.php?module=invoices&view=xml'.$having.$start_date2.$end_date2;

$smarty -> assign('url', $url);
