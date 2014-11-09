<?php
function getTradingType($id) {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."trading_types WHERE id = :id and domain_id = :domain_id";
	$sth = dbQuery($sql, ':id', $id, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$tradingType = $sth->fetch();
	$tradingType['enabled'] = $tradingType['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	
	return $tradingType;
}

function getTradingTypes() {
	global $LANG;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."trading_types WHERE domain_id = :domain_id ORDER BY description";
	$sth = dbQuery($sql, ':domain_id',$auth_session->domain_id);
	
	$tradingTypes = null;

	for ($i=0;$tradingType = $sth->fetch();$i++) {
		if ($tradingType['enabled'] == 1) {
			$tradingType['enabled'] = $LANG['enabled'];
		} else {
			$tradingType['enabled'] = $LANG['disabled'];
		}
		$tradingTypes[$i]=$tradingType;
	}
	
	return $tradingTypes;
}

function getActiveTradingTypes() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."trading_types WHERE enabled != 0 and domain_id = :domain_id ORDER BY description";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."trading_types WHERE enabled and domain_id = :domain_id ORDER BY description";
	}
	$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$tradingTypes = null;

	for ($i=0;$tradingType = $sth->fetch();$i++) {
		if ($tradingType['enabled'] == 1) {
			$tradingType['enabled'] = $LANG['enabled'];
		} else {
			$tradingType['enabled'] = $LANG['disabled'];
		}
		$tradingTypes[$i]=$tradingType;
	}
	
	return $tradingTypes;
}
