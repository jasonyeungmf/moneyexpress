<?php

class currencynote
{
    public static function count()
    {

         global $db;
         global $auth_session;
 
         $sql = "SELECT count(id) as count FROM ".TB_PREFIX."currencys_note WHERE domain_id = :domain_id ORDER BY id";
         $sth  = $db->query($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
 
         return $sth->fetch();

    }

    public static function get_all()
    {

         global $auth_session;
         global $db;
 
         $sql = "SELECT * FROM ".TB_PREFIX."currencys_note WHERE domain_id = :domain_id and visible = 1 ORDER BY id";
         $sth  = $db->query($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
 
         return $sth->fetchAll();

    }

    public static function get($id)
    {

         global $auth_session;
         global $db;
 
         $sql = "SELECT * FROM ".TB_PREFIX."currencys_note WHERE domain_id = :domain_id and id = :id";
         $sth  = $db->query($sql,':domain_id',$auth_session->domain_id, ':id',$id) or die(htmlsafe(end($dbh->errorInfo())));
 
         return $sth->fetch();

    }

    public function select_all($type='', $dir, $sort, $rp, $page )
    {
        global $config;
        global $LANG;
        global $auth_session;
        
        //SC: Safety checking values that will be directly subbed in
        if (intval($start) != $start) {
            $start = 0;
        }
        $start = (($page-1) * $limit);
        
        if (intval($limit) != $limit) {
            $limit = 25;
        }
        /*SQL Limit - start*/
        $start = (($page-1) * $rp);
        $limit = "LIMIT $start, $rp";
    
        if($type =="count")
        {
            unset($limit);
        }
        /*SQL Limit - end*/	
            
        if (!preg_match('/^(asc|desc)$/iD', $dir)) {
            $dir = 'DESC';
        }
        
        $query = $_POST['query'];
        $qtype = $_POST['qtype'];
        
        $where = "";
        if ($query) $where = " AND $qtype LIKE '%$query%' ";
        
        
        /*Check that the sort field is OK*/
        $validFields = array('id','country', 'symbol', 'currency_en', 'currency_local', 'code', 'note_buy', 'note_sell', 'note_amount', 'note_cost', 'note_total', 'notes', 'enabled');

        if (in_array($sort, $validFields)) {
            $sort = $sort;
        } else {
            $sort = "id";
        }
        
            $sql = "SELECT 
                        id,
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
            			notes,
                        (SELECT (CASE  WHEN enabled = 0 THEN '".$LANG['disabled']."' ELSE '".$LANG['enabled']."' END )) AS enabled
                    FROM 
                        ".TB_PREFIX."currencys_note  
                    WHERE 
                        visible = 1
                        AND domain_id = :domain_id
                        $where
                    ORDER BY 
                        $sort $dir 
                    $limit";
        
        
        $result = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
    
        return $result;
    }

}
