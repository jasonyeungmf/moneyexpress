<?php
function getCalculationType($id) {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."calculation_types WHERE id = :id and domain_id = :domain_id";
	$sth = dbQuery($sql, ':id', $id, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$CalculationType = $sth->fetch();
	$CalculationType['enabled'] = $CalculationType['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	
	return $CalculationType;
}

function getCalculationTypes() {
	global $LANG;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."calculation_types WHERE domain_id = :domain_id ORDER BY id";
	$sth = dbQuery($sql, ':domain_id',$auth_session->domain_id);
	
	$CalculationTypes = null;

	for ($i=0;$CalculationType = $sth->fetch();$i++) {
		if ($CalculationType['enabled'] == 1) {
			$CalculationType['enabled'] = $LANG['enabled'];
		} else {
			$CalculationType['enabled'] = $LANG['disabled'];
		}
		$CalculationTypes[$i]=$CalculationType;
	}
	
	return $CalculationTypes;
}

function getActiveCalculationTypes() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."calculation_types WHERE enabled != 0 and domain_id = :domain_id ORDER BY id";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."calculation_types WHERE enabled and domain_id = :domain_id ORDER BY id";
	}
	$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$CalculationTypes = null;

	for ($i=0;$CalculationType = $sth->fetch();$i++) {
		if ($CalculationType['enabled'] == 1) {
			$CalculationType['enabled'] = $LANG['enabled'];
		} else {
			$CalculationType['enabled'] = $LANG['disabled'];
		}
		$CalculationTypes[$i]=$CalculationType;
	}
	
	return $CalculationTypes;
}
