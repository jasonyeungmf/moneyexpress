<?php

class account
{    
    public static function get_all()
    {
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

    public static function select($serial_no)
    {
        global $LANG;
        global $db;
        global $auth_session;
        
        $sql = "SELECT * FROM ".TB_PREFIX."accounts WHERE domain_id = :domain_id AND serial_no = :serial_no";
        $sth  = $db->query($sql,':domain_id',$auth_session->domain_id, ':serial_no',$serial_no) or die(htmlsafe(end($dbh->errorInfo())));
        
	$account = $sth->fetch();
	$account['wording_for_enabled'] = $account['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $account;
    }
}