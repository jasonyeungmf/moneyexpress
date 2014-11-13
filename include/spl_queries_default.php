<?php

function getSystemDefaults() {

	global $dbh;
	global $auth_session;
    $db = new db();

    #get sql patch level - if less than 198 do sql with no exntesion table
    if ((checkTableExists(TB_PREFIX."system_defaults") == false))
    {
        return null;
    }
    if (getNumberOfDoneSQLPatches() < "198")
    {

        $sql_default  = "SELECT 
                                def.name,
                                def.value
                         FROM 
                            ".TB_PREFIX."system_defaults def";
        
        $sth = $db->query($sql_default) or die(htmlsafe(end($dbh->errorInfo())));	

    }
    if (getNumberOfDoneSQLPatches() >= "198")
    {
        $sql_default  = "SELECT 
                                def.name,
                                def.value
                         FROM 
                            ".TB_PREFIX."system_defaults def
                         INNER JOIN
                             ".TB_PREFIX."extensions ext ON (def.domain_id = ext.domain_id)";
        $sql_default .= " WHERE enabled=1";
        $sql_default .= " AND ext.name = 'core'";
        $sql_default .= " AND def.domain_id = :domain_id";
        $sql_default .= " ORDER BY extension_id ASC";		// order is important for overriding settings
        
        

        // get all settings from default domain (0)
        //$sth = dbQuery($sql.$current_settings.$order, 'domain_id', 0) or die(htmlsafe(end($dbh->errorInfo())));
        
        $sth = $db->query($sql_default, ':domain_id', 0) or die(htmlsafe(end($dbh->errorInfo())));	
	}

	$defaults = null;
	$default = null;
	
	
	while($default = $sth->fetch()) {
		$defaults["$default[name]"] = $default['value'];
	}

    if (getNumberOfDoneSQLPatches() > "198")
    {
        $sql  = "SELECT def.name,def.value FROM ".TB_PREFIX."system_defaults def INNER JOIN ".TB_PREFIX."extensions ext ON (def.extension_id = ext.id)";
        $sql .= " WHERE enabled=1";
        $sql .= " AND def.domain_id = :domain_id";
        $sql .= " ORDER BY extension_id ASC";		// order is important for overriding settings
        
        
        // add all settings from current domain
        //$sth = dbQuery($sql.$current_settings.$order, 'domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
        $sth = $db->query($sql, 'domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
        $default = null;

        while($default = $sth->fetch()) {
            $defaults["$default[name]"] = $default['value'];	// if setting is redefined, overwrite the previous value
        }
    }

	return $defaults;

}

function updateDefault($name,$value,$extension_name="core") {
	global $auth_session;
	
	$sql = "UPDATE ".TB_PREFIX."system_defaults SET value =  :value WHERE name = :name"; 

	$extension_id = getExtensionID($extension_name);
	if ($extension_id >= 0) { 
		$sql .= " AND extension_id = :extension_id"; 
	} else { 
		die(htmlsafe("Invalid extension name: ".$extension)); 
	}
	if (dbQuery($sql, ':value', $value, ':name', $name, ':extension_id', $extension_id)) { 
		return true; 
	}
	return false;
}

function getDefaultCustomer() {
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT *,c.name AS name FROM ".TB_PREFIX."customers c, ".TB_PREFIX."system_defaults s WHERE ( s.name = 'customer' AND c.id = s.value) AND c.domain_id = :domain_id";
	$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetch();
}

function getDefaultPaymentType() {
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."payment_types p, ".TB_PREFIX."system_defaults s WHERE ( s.name = 'payment_type' AND p.pt_id = s.value) AND p.domain_id = :domain_id";
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetch();
}

function getDefaultPreference() {
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."preferences p, ".TB_PREFIX."system_defaults s WHERE ( s.name = 'preference' AND p.pref_id = s.value) AND p.domain_id = :domain_id";
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetch();
}

function getDefaultBiller() {
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT *,b.name AS name FROM ".TB_PREFIX."biller b, ".TB_PREFIX."system_defaults s WHERE ( s.name = 'biller' AND b.id = s.value ) and b.domain_id = :domain_id";
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetch();
}

function getDefaultTax() {
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."tax t, ".TB_PREFIX."system_defaults s WHERE (s.name = 'tax' AND t.tax_id = s.value) AND t.domain_id = :domain_id";
	$sth = dbQuery($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetch();
}

function getDefaultDelete() {
	global $LANG;
	global $dbh;
	global $auth_session;
	//domain id TODO
	
	$sql = "SELECT value from ".TB_PREFIX."system_defaults s WHERE ( s.name = 'delete')";
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	$array = $sth->fetch();
	$delete = $array['value']==1?$LANG['enabled']:$LANG['disabled'];
	return $delete;
}

function getDefaultLogging() {
	global $LANG;
	global $dbh;

	$sql = "SELECT value from ".TB_PREFIX."system_defaults s WHERE ( s.name = 'logging')";
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	$array = $sth->fetch();
	$delete = $array['value']==1?$LANG['enabled']:$LANG['disabled'];
	return $delete;
}

function getDefaultInventory() {
	global $LANG;
	global $dbh;

	$sql = "SELECT value from ".TB_PREFIX."system_defaults s WHERE ( s.name = 'inventory')";
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	$array = $sth->fetch();
	$delete = $array['value']==1?$LANG['enabled']:$LANG['disabled'];
	return $delete;
}

function getDefaultLanguage() {
	global $LANG;
	global $dbh;

	$sql = "SELECT value from ".TB_PREFIX."system_defaults s WHERE ( s.name = 'language')";
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	$entry = $sth->fetch();
	return $entry['value'];
}

function getDefaultTradingType() {
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."trading_types t, ".TB_PREFIX."system_defaults s WHERE ( s.name = 'trading_type' AND t.id = s.value) AND t.domain_id = :domain_id";
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetch();
}