<?php
function updateAccount() {
	global $db;
	global $config;

	$sql = "UPDATE
			".TB_PREFIX."accounts
			SET
				customer_no = :customer_no,
				name = :name,
                payee = :payee,
                bank = :bank,
				account_no = :account_no,
				enabled = :enabled
				
			WHERE
				serial_no = :serial_no";

	return $db->query($sql,
		':customer_no', $_POST[customer_no],
		':name', $_POST[name],
        ':payee', $_POST[payee],
		':bank', $_POST[bank],
		':account_no', $_POST[account_no],
		':enabled', $_POST[enabled],
		':serial_no', $_GET['serial_no']
		);
	
}

function insertAccount() {
	global $db_server;
	global $auth_session;
    global $config;
	extract( $_POST );
	$sql = "INSERT INTO 
			".TB_PREFIX."accounts(
				customer_no, 
				name, 
				payee, 
				bank, 
				account_no, 
				domain_id, 
				enabled
			)
			VALUES 
			(
				:customer_no, 
				:name, 
				:payee, 
				:bank, 
				:account_no, 
				:domain_id, 
				:enabled
			)";

	return dbQuery($sql,
		':customer_no', $customer_no,
		':name', $name,
        ':payee', $payee,
        ':bank', $bank,
		':account_no', $account_no,
		':enabled', $enabled,
		':domain_id',$auth_session->domain_id
		);
	
}

function searchAccount($search) {
	global $db_server;

	$sql = "SELECT * FROM ".TB_PREFIX."accounts WHERE name LIKE :search";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."accounts WHERE name ILIKE :search";
	}
	$sth = dbQuery($sql, ':search', "%$search%");
	
	$accounts = null;
	
	for($i=0; $account = $sth->fetch(); $i++) {
		$accounts[$i] = $account;
	}
	return $accounts;
}

function getAccount($serial_no) {
	global $LANG;
	global $dbh;
	global $auth_session;

	$print_account = "SELECT * FROM ".TB_PREFIX."accounts WHERE serial_no = :serial_no and domain_id = :domain_id";
	$sth = dbQuery($print_account, ':serial_no', $serial_no, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$account = $sth->fetch();
	$account['wording_for_enabled'] = $account['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $account;
}

function getAccounts() {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."accounts WHERE domain_id = :domain_id ORDER BY name";
	$sth  = dbQuery($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$accounts = null;
	
	for($i=0;$account = $sth->fetch();$i++) {
		
  		if ($account['enabled'] == 1) {
  			$account['enabled'] = $LANG['enabled'];
  		} else {
  			$account['enabled'] = $LANG['disabled'];
  		}
		$accounts[$i] = $account;
	}
	
	return $accounts;
}

function deleteAccount($module,$idField,$serial_no) {
	global $dbh;
	global $logger;
	global $auth_session;

	$lctable = strtolower($module);
	$s_idField = ''; 

	$valid_tables = array('accounts');

	if (in_array($lctable, $valid_tables)) {
		if ($lctable == 'accounts') 
        {
			if (!in_array($idField, array('serial_no'))) {
				return false;
			} else {
				$s_idField = $idField;
			}
        } else {
			return false;
		}
	} else {
		return false;
	}

	if ($s_idField == '') {
		return false;
	}
		
	// Tablename and column both pass whitelisting and FK checks
	$sql = "DELETE FROM ".TB_PREFIX."$module WHERE $s_idField = :serial_no AND domain_id = :domain_id";
    $logger->log("Item deleted: ".$sql, ZEND_Log::INFO);
	return dbQuery($sql, ':serial_no', $serial_no, ':domain_id', $auth_session->domain_id);
}

function getActiveAccounts() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
	
	
	$sql = "SELECT * FROM ".TB_PREFIX."accounts WHERE enabled != 0 and domain_id = :domain_id ORDER BY serial_no";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."accounts WHERE enabled and domain_id = :domain_id ORDER BY serial_no";
	}
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

	return $sth->fetchAll();
}

function getActiveProvinces() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
		
	$sql = "SELECT * FROM ".TB_PREFIX."province ORDER BY id";
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetchAll();
}