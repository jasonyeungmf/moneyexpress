<?php
function getCurrencyNote($id) {
	global $LANG;
	global $dbh;
	global $auth_session;

	$sql = "SELECT * FROM ".TB_PREFIX."currencys_note WHERE id = :id and domain_id = :domain_id";
	$sth = dbQuery($sql, ':id', $id, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$currency_note = $sth->fetch();
	$currency_note['wording_for_enabled'] = $currency_note['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $currency_note;
}

function insertCurrencyNoteComplete($enabled=1,$visible=1,$country, $symbol, $currency_en, $currency_local, $code, $note_buy, $note_sell,
		 $note_amount, $note_cost, $note_total, $custom_field1 = NULL, $custom_field2, $custom_field3, $custom_field4, $notes) {

	global $auth_session;
	/*if(isset($enabled)) {
		$enabled=$enabled;
	}*/
	
	if ($db_server == 'pgsql') {
		$sql = "INSERT into
			".TB_PREFIX."currencys_note
			(domain_id, country, symbol, currency_en, currency_local, code, note_buy, note_sell, note_amount, note_cost, note_total,
			custom_field1, custom_field2,custom_field3, custom_field4, notes, enabled, visible)
		VALUES
			(	
				:domain_id, :country, :symbol, :currency_en, :currency_local, :code, :note_buy, :note_sell, :note_amount, :note_cost, :note_total,
				:custom_field1, :custom_field2, :custom_field3, :custom_field4, :notes, :enabled, :visible
			)";
	} else {
		$sql = "INSERT into
			".TB_PREFIX."currencys_note
			(
				domain_id, country, symbol, currency_en, currency_local, code, note_buy, note_sell, note_amount, note_cost, note_total,
				custom_field1, custom_field2, custom_field3, custom_field4, notes, enabled, visible
			)
		VALUES
			(	
				:domain_id,
				:country,
				:symbol,
				:currency_en,
				:currency_local,
				:code,
				:note_buy,
				:note_sell,
				:note_amount,
				:note_cost,
				:note_total,				
				:custom_field1,
				:custom_field2,
				:custom_field3,
				:custom_field4,
				:notes,
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
		':note_buy', $note_buy,
		':note_sell', $note_sell,
		':note_amount', $note_amount,
		':note_cost', $note_cost,
		':note_total', $note_total,
		':custom_field1', $custom_field1,
		':custom_field2', $custom_field2,
		':custom_field3', $custom_field3,
		':custom_field4', $custom_field4,
		':notes', "".$notes,
		':enabled', $enabled,
		':visible', $visible
		);
}


function insertCurrencyNote($enabled=1,$visible=1) {
	global $auth_session;
	
	(isset($_POST['enabled'])) ? $enabled = $_POST['enabled']  : $enabled = $enabled ;

	$sql = "INSERT into
		".TB_PREFIX."currencys_note
		(
			domain_id, 
			country,
			symbol,
			currency_en,
			currency_local,
			code,
			note_buy,
			note_sell,
			note_amount,
			note_cost,
			note_total,
            custom_field1, 
            custom_field2,
			custom_field3,
            custom_field4, 
            notes, 
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
			:note_buy,
			:note_sell,
			:note_amount,
			:note_cost,
			:note_total,
			:description,
			:custom_field1,
			:custom_field2,
			:custom_field3,
			:custom_field4,
			:notes,
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
		':note_buy', $_POST['note_buy'],
		':note_sell', $_POST['note_sell'],
		':note_amount', $_POST['note_amount'],
		':note_cost', $_POST['note_cost'],
		':note_total', $_POST['note_total'],
		':custom_field1', $_POST['custom_field1'],
		':custom_field2', $_POST['custom_field2'],
		':custom_field3', $_POST['custom_field3'],
		':custom_field4', $_POST['custom_field4'],
		':notes', "".$_POST['notes'],
		':enabled', $enabled,
		':visible', $visible
		);
}

function updateCurrencysNoteRate() {
	global $dbh;
	global $auth_session;
	require_once("excel/reader.php");
	
$sql = "SELECT code,note_buy,note_sell FROM ".TB_PREFIX."currencys_note WHERE domain_id=:domain_id ORDER BY code DESC";
$sth = dbQuery($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

$c=0;
while($rs = $sth->fetch()){
   $g_info[$c]=$rs['code'];
   $c++;
}
mysql_free_result($sth);

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP936');
$data->read('excelfile/exchage_rate.xls');
error_reporting(E_ALL ^ E_NOTICE);

for ($i = 4; $i <= 30; $i++) {
   $code=$data->sheets[0]['cells'][$i][6];
   if(in_array($code,$g_info)){
    $note_buy=$data->sheets[0]['cells'][$i][7];
	$note_sell=$data->sheets[0]['cells'][$i][8];
    $sql="UPDATE ".TB_PREFIX."currencys_note SET note_buy=$note_buy,note_sell=$note_sell WHERE code = :code AND domain_id = :domain_id";
	$sth = dbQuery($sql,':code',$code,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
   }
}
}

function updateCurrencyNote() {
	
	$sql = "UPDATE ".TB_PREFIX."currencys_note
				SET
				country = :country,
				symbol = :symbol,
				currency_en = :currency_en,
				currency_local = :currency_local,
				code = :code,
				note_buy = :note_buy,
				note_sell = :note_sell,
				note_amount = :note_amount,
				note_cost = :note_cost,
				note_total = :note_total,
				enabled = :enabled,
				notes = :notes,
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
		':note_buy', $_POST[note_buy],
		':note_sell', $_POST[note_sell],
		':note_amount', $_POST[note_amount],
		':note_cost', $_POST[note_cost],
		':note_total', $_POST[note_total],	
		':enabled', $_POST['enabled'],
		':notes', $_POST[notes],
		':custom_field1', $_POST[custom_field1],
		':custom_field2', $_POST[custom_field2],
		':custom_field3', $_POST[custom_field3],
		':custom_field4', $_POST[custom_field4],
		':id', $_GET[id]
		);
}

function addItemUpdateCurrencyNote($trading_type_id,$product_id,$quantity,$unit_price) {
	global $dbh;
	global $auth_session;
	$sql = "SELECT note_amount,note_cost,note_total FROM ".TB_PREFIX."currencys_note WHERE id=:id";
	$sth = dbQuery($sql,':id',$product_id) or die(htmlsafe(end($dbh->errorInfo())));
	$currency_note = $sth->fetch();

	$hkd_sql = "SELECT note_total FROM ".TB_PREFIX."currencys_note WHERE id=:id";
	$hkd_sth = dbQuery($hkd_sql,':id',27) or die(htmlsafe(end($dbh->errorInfo())));
	$hkd = $hkd_sth->fetch();
	if($trading_type_id == 1){
		$note_amount = $currency_note['note_amount'] + $quantity;
		$note_total = $currency_note['note_total'] + ($quantity * $unit_price);
		$note_cost = $note_total / $note_amount;
		$sql="UPDATE ".TB_PREFIX."currencys_note SET note_amount=$note_amount,note_cost=$note_cost,note_total=$note_total WHERE id=:id";
		$sth = dbQuery($sql,':id',$product_id) or die(htmlsafe(end($dbh->errorInfo())));
		
		$hkd_note_total = $hkd['note_total'] - ($quantity * $unit_price);
		$hkd_sql="UPDATE ".TB_PREFIX."currencys_note SET note_total=$hkd_note_total WHERE id=:id";
		$hkd_sth = dbQuery($hkd_sql,':id',27) or die(htmlsafe(end($dbh->errorInfo())));
	}

	if($trading_type_id == 2){
		$note_amount = $currency_note['note_amount'] - $quantity;
		$note_total = $note_amount * $currency_note['note_cost'];
		$sql="UPDATE ".TB_PREFIX."currencys_note SET note_amount=$note_amount,note_total=$note_total WHERE id=:id";
		$sth = dbQuery($sql,':id',$product_id) or die(htmlsafe(end($dbh->errorInfo())));
		
		$hkd_note_total = $hkd['note_total'] + ($quantity * $unit_price);
		$hkd_sql="UPDATE ".TB_PREFIX."currencys_note SET note_total=$hkd_note_total WHERE id=:id";
		$hkd_sth = dbQuery($hkd_sql,':id',27) or die(htmlsafe(end($dbh->errorInfo())));
	}
}

function delInvoicesUpdateCurrencyNote($trading_type_id,$product_id,$quantity,$unit_price,$note_sell_cost) {
	global $dbh;
	global $auth_session;
	$sql = "SELECT note_amount,note_cost,note_total FROM ".TB_PREFIX."currencys_note WHERE id=:id";
	$sth = dbQuery($sql,':id',$product_id) or die(htmlsafe(end($dbh->errorInfo())));
	$currency_note = $sth->fetch();

	$hkd_sql = "SELECT note_total FROM ".TB_PREFIX."currencys_note WHERE id=:id";
	$hkd_sth = dbQuery($hkd_sql,':id',27) or die(htmlsafe(end($dbh->errorInfo())));
	$hkd = $hkd_sth->fetch();
	if($trading_type_id == 1){
		$note_amount = $currency_note['note_amount'] - $quantity;
		$note_total = $currency_note['note_total'] - ($quantity * $unit_price);
		$note_cost = $note_total / $note_amount;
		$sql="UPDATE ".TB_PREFIX."currencys_note SET note_amount=$note_amount,note_cost=$note_cost,note_total=$note_total WHERE id=:id";
		$sth = dbQuery($sql,':id',$product_id) or die(htmlsafe(end($dbh->errorInfo())));
		
		$hkd_note_total = $hkd['note_total'] + ($quantity * $unit_price);
		$hkd_sql="UPDATE ".TB_PREFIX."currencys_note SET note_total=$hkd_note_total WHERE id=:id";
		$hkd_sth = dbQuery($hkd_sql,':id',27) or die(htmlsafe(end($dbh->errorInfo())));
	}

	if($trading_type_id == 2){
		$note_amount = $currency_note['note_amount'] + $quantity;
		$note_total = $currency_note['note_total'] + ($quantity * $note_sell_cost);
		$note_cost = $note_total / $note_amount;
		$sql="UPDATE ".TB_PREFIX."currencys_note SET note_amount=$note_amount,note_cost=$note_cost,note_total=$note_total WHERE id=:id";
		$sth = dbQuery($sql,':id',$product_id) or die(htmlsafe(end($dbh->errorInfo())));
		
		$hkd_note_total = $hkd['note_total'] - ($quantity * $unit_price);
		$hkd_sql="UPDATE ".TB_PREFIX."currencys_note SET note_total=$hkd_note_total WHERE id=:id";
		$hkd_sth = dbQuery($hkd_sql,':id',27) or die(htmlsafe(end($dbh->errorInfo())));
	}
}

function getCurrencysNote() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."currencys_note WHERE visible = 1 AND domain_id = :domain_id ORDER BY code";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."currencys_note WHERE visible and domain_id = :domain_id ORDER BY code";
	}
	$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$currencys_note = null;
	
	for($i=0;$currency_note = $sth->fetch();$i++) {
		
		if ($currency_note['enabled'] == 1) {
			$currency_note['enabled'] = $LANG['enabled'];
		} else {
			$currency_note['enabled'] = $LANG['disabled'];
		}

		$currencys_note[$i] = $currency_note;
	}
	
	return $currencys_note;
}

function getActiveCurrencysNote() {
	global $dbh;
	global $db_server;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."currencys_note WHERE enabled and domain_id = :domain_id ORDER BY code";
	$sth = dbQuery($sql, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	return $sth->fetchAll();
}