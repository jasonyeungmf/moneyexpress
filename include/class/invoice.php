<?php
class invoice {
	
public $date_between;
public $start_date;
public $end_date;
public $having;
public $having_and;
public $having_and2;
public $biller;
public $customer;
public $sort;
public $where_field;
public $where_value;
public $trading_type;
public $this_year;
public $this_month;
public $today;
public $get_this_year;
public $get_this_month;
public $get_today;

	public function insert()
	{
		global $dbh;
		global $db_server;
		global $auth_session;
		
		$sql = "INSERT INTO ".TB_PREFIX."invoices
			(
				id, 
		 		index_id,
				domain_id,
				biller_id, 
				customer_id,
				preference_id,
				trading_type_id,  
				date, 
				note
			)
			VALUES
			(
				NULL,
				:index_id,
				:domain_id,
				:biller_id,
				:customer_id,
				:preference_id,
				:trading_type_id,
				:date,
				:note
				)";

		$pref_group=getPreference($this->preference_id);
		$sth= dbQuery($sql,
			':index_id', index::next('invoice',$pref_group[index_group],$this->biller_id),
			':domain_id', $auth_session->domain_id,
			':biller_id', $this->biller_id,
			':customer_id', $this->customer_id,
			':preference_id', $this->preference_id,
			':trading_type_id', $this->trading_type_id,
			':date', $this->date,
			':note', $this->note
			);
	    index::increment('invoice',$pref_group[index_group],$this->biller_id);
	    return lastInsertID();
	}

	public function insert_item()
	{	
		$sql = "INSERT INTO ".TB_PREFIX."invoice_items 
				(	
					invoice_id,
					trading_type_id,
					description, 
					currency_id, 
					quantity,
					unit_price,
					subtotal,  
					charge,					
					total,
					note_cost
				) 
				VALUES 
				(
					:invoice_id,
					:trading_type_id,
					:description,
					:currency_id,
					:quantity, 
					:unit_price,
					:subtotal,
					:charge,
					:total,
					note_cost
				)";
		
		dbQuery($sql,
			':invoice_id', $this->invoice_id,
			':quantity', $this->quantity,
			':currency_id', $this->currency_id,
			':trading_type_id', $this->trading_type_id,
			':unit_price', $this->unit_price,
			':charge', $this->charge,
			':subtotal', $this->subtotal,
			':description', $this->description,
			':total', $this->total,
			':note_cost', $this->note_cost
			);
		//invoice_item_tax(lastInsertId(),$this->tax,$this->unit_price,$this->quantity,"insert");
	}

    public static function select($id)
    {
		global $logger;
		global $db;
		global $auth_session;
		$sql = "SELECT 
                    i.*,
		    i.date as date_original,
		    (SELECT CONCAT(i.index_id)) as index_id,
                    p.pref_inv_wording AS preference,
                    p.status
                FROM 
                    ".TB_PREFIX."invoices i, 
                    ".TB_PREFIX."preferences p 
                WHERE 
                    i.domain_id = :domain_id 
                    and
                    i.preference_id = p.pref_id
                    and 
                    i.id = :id";
		$sth = $db->query($sql, ':id', $id, ':domain_id', $auth_session->domain_id);

        $invoice = $sth->fetch();
	$invoice['calc_date'] = date('Y-m-d', strtotime( $invoice['date'] ) );
//	$invoice['date'] = siLocal::date( $invoice['date'] );
	$invoice['total'] = getInvoiceTotal($invoice['id']);
	$invoice['subtotal'] = invoice::getInvoiceGross($invoice['id']);
	$invoice['invoice_items'] = invoice::getInvoiceItems($id);
	return $invoice;    
	}

    public static function get_all()
    {
	global $logger;
	global $auth_session;
		$sql = "SELECT 
                    i.id as id,
                    (SELECT CONCAT(p.pref_inv_wording,' ',i.index_id)) as index_id
                FROM 
                    ".TB_PREFIX."invoices i, 
                    ".TB_PREFIX."preferences p 
                WHERE 
                    i.domain_id = :domain_id 
                    and
                    i.preference_id = p.pref_id
                order by 
                    index_id";
		$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id);
        return $sth->fetchAll();
    }

function select_all($type='', $dir='DESC', $rp='25', $page='1', $having='')
    {
        global $config;
        global $auth_session;
        if(empty($having))
        {
            $having = $this->having;
        }
        if ($this->having_and) $having_and  = $this->having_and;
        $sort = $this->sort;
        /*SQL Limit - start*/
        $start = (($page-1) * $rp);
        $limit = "LIMIT ".$start.", ".$rp;
        /*SQL Limit - end*/

        /*SQL where - start*/
        $query = $this->query;
        $qtype = $this->qtype;

        $where = " WHERE iv.domain_id = :domain_id ";
	if ($query) $where = " WHERE iv.domain_id = :domain_id AND $qtype LIKE '%$query%' ";
	/*exact match search*/
	if($_POST['qtype'] == 'iv.id'){
		if ($query) $where = " WHERE iv.domain_id = :domain_id AND $qtype = '$query' ";
	}
        if ($this->biller) $where .= " AND b.id = '$this->biller' ";
        if ($this->customer) $where .= " AND c.customer_no = '$this->customer' ";
	if ($this->trading_type) $where .= " AND t.id = '$this->trading_type' ";
        if ($this->where_field) $where .= " AND $this->where_field = '$this->where_value' ";
        /*SQL where - end*/	

        /*Check that the sort field is OK*/
        $validFields = array('index_id','iv.id', 'biller', 'customer', 'trading_type', 'invoice_total','date','preference');
        if (in_array($sort, $validFields)) {
            $sort = $sort;
        } else {
            $sort = "id";
        }
        if($type =="count")
        {
            //unset($limit);
            $limit="";
        }

	$get_this_year = date("Y");
	$get_this_month = date("Ym");
	$get_today = date("Ymd");	
		
        switch ($having) 
        {   
            case "date_between":
                $sql_having = "HAVING date_between between '$this->start_date' and '$this->end_date'";
                break;
	    case "date_between_note_buy":
                $sql_having = "HAVING (date_between between '$this->start_date' and '$this->end_date') AND ( iv.trading_type_id = 1 )";
                break;
	    case "date_between_note_sell":
	        $sql_having = "HAVING (date_between between '$this->start_date' and '$this->end_date') AND ( iv.trading_type_id = 2 )";
	        break;
		
	    case "note_buy":
	        $sql_having = "HAVING ( iv.trading_type_id = 1 ) ";
	        break;
	    case "note_sell":
	        $sql_having = "HAVING ( iv.trading_type_id = 2 ) ";
	        break;
		
	    case "this_year":
	    	$sql_having = "HAVING ( this_year = $get_this_year ) ";
	    	break;
	    case "this_year_note_buy":
		$sql_having = "HAVING ( this_year = $get_this_year ) AND ( iv.trading_type_id = 1 )";
		break;
	    case "this_year_note_sell":
	    	$sql_having = "HAVING ( this_year = $get_this_year ) AND ( iv.trading_type_id = 2 )";
	    	break;
		    
	    case "this_month":
	    	$sql_having = "HAVING ( this_month = $get_this_month ) ";
	    	break;
	    case "this_month_note_buy":
		$sql_having = "HAVING ( this_month = $get_this_month ) AND ( iv.trading_type_id = 1 )";
		break;
	    case "this_month_note_sell":
	    	$sql_having = "HAVING ( this_month = $get_this_month ) AND ( iv.trading_type_id = 2 )";
	    	break;
		    
	    case "today":
	    	$sql_having = "HAVING ( today = $get_today ) ";
	    	break;
	    case "today_note_buy":
		$sql_having = "HAVING ( today = $get_today ) AND ( iv.trading_type_id = 1 )";
		break;
	    case "today_note_sell":
	    	$sql_having = "HAVING ( today = $get_today ) AND ( iv.trading_type_id = 2 )";
	    	break;		
        }

        switch ($having_and) 
        {   
            case "date_between":
                $sql_having .= "AND ( date between '$this->start_date' and '$this->end_date' )";
                break;
        }

        switch ($having_and2) 
        {   
            case "date_between":
                $sql_having .= "AND ( date between '$this->start_date' and '$this->end_date' )";
                break;
        }

        switch ($config->database->adapter)
        {
            case "pdo_mysql":
            default:
               $sql ="
                SELECT  
                       	iv.id,
		       	iv.trading_type_id,
                       	iv.index_id AS index_id,
                       	b.name AS biller,
                       	c.name AS customer,
		       	t.description AS trading_type,
		       (SELECT coalesce(SUM(ii.quantity * ii.unit_price - ii.quantity * ii.note_cost), 0) FROM " .TB_PREFIX . "invoice_items ii WHERE ii.invoice_id = iv.id) AS profit1,
                       (SELECT (CASE   WHEN iv.trading_type_id = 2 THEN ROUND(profit1*100)/100
                                        ELSE '-' END)) AS profit,
		       (SELECT coalesce(SUM(ii.total), 0) FROM " .TB_PREFIX . "invoice_items ii WHERE ii.invoice_id = iv.id) AS invoice_total,
		       
		       GROUP_CONCAT(cn.code,ii.quantity SEPARATOR '-') AS currency_detail,
		       
                       
                       DATE_FORMAT(date,'%Y-%m-%d %H:%i:%S') AS date,
		       DATE_FORMAT(date,'%Y-%m-%d') AS date_between,
			DATE_FORMAT(date,'%Y') AS this_year,
		       	DATE_FORMAT(date,'%Y%m') AS this_month,
		       	DATE_FORMAT(date,'%Y%m%d') AS today,
                       pf.pref_description AS preference,
                       pf.status AS status
		       
                FROM   " . TB_PREFIX . "invoices iv
                        LEFT JOIN " . TB_PREFIX . "biller b ON b.id = iv.biller_id
                        LEFT JOIN " . TB_PREFIX . "customers c ON c.customer_no = iv.customer_id
                        LEFT JOIN " . TB_PREFIX . "preferences pf ON pf.pref_id = iv.preference_id
			LEFT JOIN " . TB_PREFIX . "trading_types t ON t.id = iv.trading_type_id
			LEFT JOIN " . TB_PREFIX . "invoice_items ii ON ii.invoice_id = iv.id
			LEFT JOIN " . TB_PREFIX . "currencys_note cn ON cn.id = ii.currency_id 
                $where
                GROUP BY
                iv.id
                $sql_having
                ORDER BY
                $sort $dir
                $limit";
                break;
        }
        
        $result =  dbQuery($sql,':domain_id', $auth_session->domain_id) or die(end($dbh->errorInfo()));
        return $result;
    }

    public function select_all_where()
    {
	global $logger;
	global $auth_session;
        if($this->filter == "date")
        {
            $where = "and date between '$this->start_date' and '$this->end_date'";
        }
		$sql = "SELECT i.*, p.pref_description as preference FROM ".TB_PREFIX."invoices i,".TB_PREFIX."preferences p  WHERE i.domain_id = :domain_id and i.preference_id = p.pref_id  order by i.id";
		$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id);
        return $sth->fetchAll();
    }

public static function getInvoiceItems($id) {	
	global $logger;
	$sql = "SELECT * FROM ".TB_PREFIX."invoice_items WHERE invoice_id = :id order by id";
	$sth = dbQuery($sql, ':id', $id);		
	$invoiceItems = null;		
	for($i=0;$invoiceItem = $sth->fetch();$i++) {		
		$invoiceItem['quantity'] = $invoiceItem['quantity'];
		$invoiceItem['unit_price'] = $invoiceItem['unit_price'];
		$invoiceItem['charge'] = $invoiceItem['charge'];
		$invoiceItem['subtotal'] = $invoiceItem['subtotal'];
		$invoiceItem['total'] = $invoiceItem['total'];
		$invoiceItem['note_cost'] = $invoiceItem['note_cost'];
		$invoiceItem['trading_type_id'] = $invoiceItem['trading_type_id'];			
		$sql = "SELECT * FROM ".TB_PREFIX."currencys_note WHERE id = :id";
		$tth = dbQuery($sql, ':id', $invoiceItem['currency_id']) or die(htmlsafe(end($dbh->errorInfo())));
		$invoiceItem['currency'] = $tth->fetch();	
		$invoiceItems[$i] = $invoiceItem;
	}		
	return $invoiceItems;
}
  
//Function: are_there_any * Used to see if there are any invoices in the database for a given domain
    public static function are_there_any()
    {
	    global $auth_session;
		$sql = "SELECT count(*) as count FROM ".TB_PREFIX."invoices where domain_id = :domain_id limit 2";
		$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id);
        $count = $sth->fetch();
        return $count['count'];
    }
    
//Used to get the gross total for a given invoice number
public static function getInvoiceGross($invoice_id)
{
    global $LANG;
    $sql ="SELECT SUM(subtotal) AS subtotal FROM ".TB_PREFIX."invoice_items WHERE invoice_id =  :invoice_id";
    $sth = dbQuery($sql, ':invoice_id', $invoice_id);
    $res = $sth->fetch();
    return $res['subtotal'];
}
    
public static function getInvoiceCharge($invoice_id)
{
        global $LANG;
        $sql ="SELECT SUM(charge) AS charge FROM ".TB_PREFIX."invoice_items WHERE invoice_id =  :invoice_id";
        $sth = dbQuery($sql, ':invoice_id', $invoice_id);
        $res = $sth->fetch();
	return $res['charge'];
}    

//Used to get the max invoice id
public static function max()
{
        global $auth_session;
        global $logger;
        $db=new db();
        if ( getNumberOfDonePatches() < '179')
        {
            $sql ="SELECT max(id) as max FROM ".TB_PREFIX."invoices";
		    $sth = $db->query($sql);
        } else {
            $sql ="SELECT max(id) as max FROM ".TB_PREFIX."invoices WHERE domain_id = :domain_id";
		    $sth = $db->query($sql, ':domain_id', $auth_session->domain_id);
        }
        $count = $sth->fetch();
	$logger->log('Max Invoice: '.$count['max'], Zend_Log::INFO);
	return $count['max'];
}

public function recur()
{
	$invoice = invoice::select($this->id);
	$ni = new invoice();
	$ni->biller_id = $invoice['biller_id'];
	$ni->customer_id = $invoice['customer_id'];
	$ni->preference_id = $invoice['preference_id'];
	$ni->trading_type_id = $invoice['trading_type_id'];
	//$ni->date = $invoice['date_original'];
	$ni->date = date('Y-m-d');
	$ni->note = $invoice['note'];
	$ni_id = $ni->insert();
	//insert each line item
	foreach ($invoice['invoice_items'] as $key => $value)
	{
		$nii = new invoice();
		$nii->invoice_id=$ni_id;
		$nii->quantity=$invoice['invoice_items'][$key]['quantity'];
		$nii->currency_id=$invoice['invoice_items'][$key]['currency_id'];
		$nii->trading_type_id=$invoice['invoice_items'][$key]['trading_type_id'];
		$nii->unit_price=$invoice['invoice_items'][$key]['unit_price'];
		$nii->charge=$invoice['invoice_items'][$key]['charge'];
		$nii->subtotal=$invoice['invoice_items'][$key]['subtotal'];
		$nii->description=$invoice['invoice_items'][$key]['description'];
		$nii->total=$invoice['invoice_items'][$key]['total'];
		$nii_id = $nii->insert_item();
	}	
	return $ni_id;
}
}