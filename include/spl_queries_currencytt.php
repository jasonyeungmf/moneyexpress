<?php

function getCurrencyTT($id) {
	global $LANG;
	global $dbh;
	global $auth_session;

	$sql = "SELECT * FROM ".TB_PREFIX."currencys_tt WHERE id = :id and domain_id = :domain_id";
	$sth = dbQuery($sql, ':id', $id, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$currency_tt = $sth->fetch();
	$currency_tt['wording_for_enabled'] = $currency_tt['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $currency_tt;
}

function insertCurrencyTTComplete($enabled=1,$visible=1,$country, $symbol, $currency_en, $currency_local, $code, $tt_buy, $tt_sell,
		 $custom_field1 = NULL, $custom_field2, $custom_field3, $custom_field4) {

	global $auth_session;
	/*if(isset($enabled)) {
		$enabled=$enabled;
	}*/
	
	if ($db_server == 'pgsql') {
		$sql = "INSERT into
			".TB_PREFIX."currencys_tt
			(domain_id, country, symbol, currency_en, currency_local, code, tt_buy, tt_sell, custom_field1, custom_field2, 
			custom_field3, custom_field4, enabled, visible)
		VALUES
			(	
				:domain_id, :country, :symbol, :currency_en, :currency_local, :code, :tt_buy, :tt_sell, :custom_field1, :custom_field2,
				:custom_field3, :custom_field4, :enabled, :visible
			)";
	} else {
		$sql = "INSERT into
			".TB_PREFIX."currencys_tt
			(
				domain_id, country, symbol, currency_en, currency_local, code, tt_buy, tt_sell, custom_field1, custom_field2, 
				custom_field3, custom_field4, enabled, visible
			)
		VALUES
			(	
				:domain_id,
				:country,
				:symbol,
				:currency_en,
				:currency_local,
				:code,
				:tt_buy,
				:tt_sell,
				:custom_field1,
				:custom_field2,
				:custom_field3,
				:custom_field4,
				:enabled,
				:visible
			)";
	}
	return dbQuery($sql,
		':domain_id',$auth_session->domain_id,	
		':country', $country,
		':symbol', $symbol,
		':currency_en', $currency_en,
		':currency_local', $currency_local,
		':code', $code,
		':tt_buy', $tt_buy,
		':tt_sell', $tt_sell,
		':custom_field1', $custom_field1,
		':custom_field2', $custom_field2,
		':custom_field3', $custom_field3,
		':custom_field4', $custom_field4,
		':enabled', $enabled,
		':visible', $visible
		);
}


function insertCurrencyTT($enabled=1,$visible=1) {
	global $auth_session;
	
	(isset($_POST['enabled'])) ? $enabled = $_POST['enabled']  : $enabled = $enabled ;

	$sql = "INSERT into
		".TB_PREFIX."currencys_tt
		(
			domain_id, 
			country,
			symbol,
			currency_en,
			currency_local,
			code,
			tt_buy,
			tt_sell,
            custom_field1, 
            custom_field2,
			custom_field3,
            custom_field4, 
            enabled, 
            visible
		)
	VALUES
		(	
			:domain_id,
			:country,
			:symbol,
			:currency_en,
			:currency_local,
			:code,
			:tt_buy,
			:tt_sell,
			:custom_field1,
			:custom_field2,
			:custom_field3,
			:custom_field4,
			:enabled,
			:visible
		)";

	return dbQuery($sql,
		':domain_id',$auth_session->domain_id,
		':country', $_POST['country'],
		':symbol', $_POST['symbol'],
		':currency_en', $_POST['currency_en'],		
		':currency_local', $_POST['currency_local'],
		':code', $_POST['code'],
		':tt_buy', $_POST['tt_buy'],
		':tt_sell', $_POST['tt_sell'],
		':custom_field1', $_POST['custom_field1'],
		':custom_field2', $_POST['custom_field2'],
		':custom_field3', $_POST['custom_field3'],
		':custom_field4', $_POST['custom_field4'],
		':enabled', $enabled,
		':visible', $visible
		);
}

function updateCurrencysTTRate() {
	global $dbh;
	global $auth_session;
	require_once("excel/reader.php");
	
$sql = "SELECT id,tt_buy,tt_sell FROM ".TB_PREFIX."currencys_tt order by id desc";
$sth = dbQuery($sql, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

$c=0;
while($rs = $sth->fetch()){
   $g_info[$c]=$rs['id'];
   $c++;
}
mysql_free_result($sth);

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP936');
$data->read('excelfile/remittance_rate_2.xls');
error_reporting(E_ALL ^ E_NOTICE);

for ($i = 2; $i <= 6; $i++) {
   $id=$data->sheets[0]['cells'][$i][1];
   if(in_array($id,$g_info)){
    $tt_buy=$data->sheets[0]['cells'][$i][8];
	$tt_sell=$data->sheets[0]['cells'][$i][7];
	$tt_buy = round($tt_buy,4);//进一法取整.
	$tt_sell = round($tt_sell,4);//舍去法取整.
    $sql="UPDATE ".TB_PREFIX."currencys_tt SET tt_buy=$tt_buy,tt_sell=$tt_sell WHERE id='$id'";
	$sth = dbQuery($sql, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
   }
}
}

function updateCurrencyTT() {
	
	$sql = "UPDATE ".TB_PREFIX."currencys_tt
				SET
				country = :country,
				symbol = :symbol,
				currency_en = :currency_en,
				currency_local = :currency_local,
				code = :code,
				tt_buy = :tt_buy,
				tt_sell = :tt_sell,
				enabled = :enabled,
				custom_field1 = :custom_field1,
				custom_field2 = :custom_field2,
				custom_field3 = :custom_field3,
				custom_field4 = :custom_field4
			WHERE
				id = :id";

	return dbQuery($sql,
		':country', $_POST[country],
		':symbol', $_POST[symbol],
		':currency_en', $_POST[currency_en],
		':currency_local', $_POST[currency_local],
		':code', $_POST[code],
		':tt_buy', $_POST[tt_buy],
		':tt_sell', $_POST[tt_sell],
		':enabled', $_POST['enabled'],
		':custom_field1', $_POST[custom_field1],
		':custom_field2', $_POST[custom_field2],
		':custom_field3', $_POST[custom_field3],
		':custom_field4', $_POST[custom_field4],
		':id', $_GET[id]
		);
}

function getCurrencysTT() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."currencys_tt WHERE visible = 1 AND domain_id = :domain_id ORDER BY id";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."currencys_tt WHERE visible and domain_id = :domain_id ORDER BY id";
	}
	$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$currencys_tt = null;
	
	for($i=0;$currency_tt = $sth->fetch();$i++) {
		
		if ($currency_tt['enabled'] == 1) {
			$currency_tt['enabled'] = $LANG['enabled'];
		} else {
			$currency_tt['enabled'] = $LANG['disabled'];
		}

		$currencys_tt[$i] = $currency_tt;
	}
	
	return $currencys_tt;
}

function getActiveCurrencysTT() {
	global $dbh;
	global $db_server;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."currencys_tt WHERE enabled and domain_id = :domain_id ORDER BY id";
	$sth = dbQuery($sql, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	return $sth->fetchAll();
}