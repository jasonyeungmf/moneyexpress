<?php
function getPreference($id) {
	global $LANG;
	global $dbh;
	global $auth_session;

	$print_preferences = "SELECT * FROM ".TB_PREFIX."preferences WHERE pref_id = :id and domain_id = :domain_id";
	$sth = dbQuery($print_preferences, ':id', $id,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$preference = $sth->fetch();
	$preference['status_wording'] = $preference['status']==1?$LANG['real']:$LANG['draft'];
	$preference['enabled'] = $preference['pref_enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $preference;
}

function getPreferences() {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."preferences WHERE domain_id = :domain_id ORDER BY pref_id";
	$sth  = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$preferences = null;
	
	for($i=0;$preference = $sth->fetch();$i++) {
		
  		if ($preference['pref_enabled'] == 1) {
  			$preference['enabled'] = $LANG['enabled'];
  		} else {
  			$preference['enabled'] = $LANG['disabled'];
  		}

		$preferences[$i] = $preference;
	}
	
	return $preferences;
}

function getActivePreferences() {
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."preferences WHERE pref_enabled and domain_id = :domain_id ORDER BY pref_id";
	$sth  = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

	return $sth->fetchAll();
}