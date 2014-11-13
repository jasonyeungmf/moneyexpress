<?php
class invoicett {
	
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
public $payment_type;
public $account;
public $product;
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
		
		$sql = "INSERT INTO
			".TB_PREFIX."invoices_tt (
				index_id,
				domain_id,
				biller_id, 
				customer_id,
				preference_id,
				trading_type_id, 
				payment_type_id,
				calculation_type_id,
				account_id,
				product_id,
				date, 
				quantity,
				unit_price,
				charge,
				total,
				payable_amount,
				spell_number,
				note,
				custom_field1,
				custom_field2,
				custom_field3,
				custom_field4
			)
			VALUES
			(
				:index_id,
				:domain_id,
				:biller_id,
				:customer_id,
				:preference_id,
				:trading_type_id, 
				:payment_type_id,
				:calculation_type_id,
				:account_id,
				:product_id,
				:date, 
				:quantity,
				:unit_price,
				:charge,
				:total,
				:payable_amount,
				:spell_number,
				:note,
				:customField1,
				:customField2,
				:customField3,
				:customField4
				)";
		//$pref_group=getPreference($this->preference_id);
		$sth= dbQuery($sql,
			':index_id', $_POST[index_id],
			':domain_id', $auth_session->domain_id,
			':biller_id', $_POST[biller_id],
			':customer_id', $_POST[customer_id],
			':preference_id', $_POST[preference_id],
			':trading_type_id', $_POST[trading_type_id],
			':payment_type_id', $_POST[payment_type_id],
			':calculation_type_id', $_POST[calculation_type_id],
			':account_id', $_POST[account_id],
			':product_id', $_POST[product_id],
			':date', $_POST[date],
			':quantity', $_POST[quantity],
			':unit_price', $_POST[unit_price],
			':charge', $_POST[charge],
			':total', $_POST[total],
			':payable_amount', $_POST[payable_amount],
			':spell_number', $_POST[spell_number],
			':note', $_POST[note],
			':customField1', $_POST[customField1],
			':customField2', $_POST[customField2],
			':customField3', $_POST[customField3],
			':customField4', $_POST[customField4]
			);
	    //index::increment('invoice',$pref_group[index_group],$this->biller_id);
	    //return $sth;
	    return lastInsertID();
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
                    ".TB_PREFIX."invoices_tt i, 
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
	
	return $invoice;
    
	}

    public static function get_all()
    {
	global $logger;
	global $auth_session;

		$sql = "SELECT 
                    i.id as id,
                    i.index_id as index_id
                FROM 
                    ".TB_PREFIX."invoices_tt i, 
                    ".TB_PREFIX."preferences p 
                WHERE 
                    i.domain_id = :domain_id 
                    and
                    i.preference_id = p.pref_id
                order by 
                    id";
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
		if($_POST['qtype'] == 'index_id' || $_POST['qtype'] == 'customer_id'){
			if ($query) $where = " WHERE iv.domain_id = :domain_id AND $qtype = '$query' ";
		}

		/* multi-field search*/
		if($_POST['qtype'] == 'customer_detail'){
			$qtype1 = "c.name";
			$qtype2 = "c.attention";
			$qtype3 = "c.id_no";
			$qtype4 = "c.mobile_phone";
			$qtype5 = "c.phone";
			$qtype6 = "c.fax";
			if ($query) $where = " 	WHERE a.domain_id = :domain_id 
									AND $qtype1 LIKE '%$query%' 
									OR 	$qtype2 LIKE '%$query%' 
									OR 	$qtype3 LIKE '%$query%' 
									OR 	$qtype4 LIKE '%$query%' 
									OR 	$qtype5 LIKE '%$query%' 
									OR 	$qtype6 LIKE '%$query%' 
								";
		}

		/* multi-field search*/
		if($_POST['qtype'] == 'account_detail'){
			$qtype1 = "a.payee";
			$qtype2 = "a.bank";
			$qtype3 = "a.account_no";
			if ($query) $where = " 	WHERE a.domain_id = :domain_id 
									AND $qtype1 LIKE '%$query%' 
									OR 	$qtype2 LIKE '%$query%' 
									OR 	$qtype3 LIKE '%$query%' 
								";
		}

	    //if ($this->biller) $where .= " AND b.id = '$this->biller' ";
	    //if ($this->customer) $where .= " AND c.customer_no = '$this->customer' ";
		//if ($this->trading_type) $where .= " AND tt.id = '$this->trading_type' ";
	    //if ($this->where_field) $where .= " AND $this->where_field = '$this->where_value' ";
	    /*SQL where - end*/
	

        /*Check that the sort field is OK*/
        $validFields = array('id','date','index_id','biller','customer_detail','customer_detail_2','account_detail','payment_type','quantity','unit_price','charge','total','trading_type','product','calculation_type','payable_amount','spell_number','note','preference');

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
        	// Date Between
            case "date_between":
                $sql_having = "HAVING date_between between '$this->start_date' and '$this->end_date'";
                break;
	    	case "date_between_tt_buy":
                $sql_having = "HAVING (date_between between '$this->start_date' and '$this->end_date') AND ( trading_type_id = 3 )";
                break;
	    	case "date_between_tt_sell":
	        $sql_having = "HAVING (date_between between '$this->start_date' and '$this->end_date') AND ( trading_type_id = 4 )";
	        break;
		
			// TT Buy
		    case "tt_buy":
		        $sql_having = "HAVING ( trading_type_id = 3 ) ";
		        break;

		    // TT Sell
		    case "tt_sell":
		        $sql_having = "HAVING ( trading_type_id = 4 ) ";
		        break;
			
			// Year
		    case "this_year":
		    	$sql_having = "HAVING ( year = $get_this_year ) ";
		    	break;
		    case "this_year_tt_buy":
			$sql_having = "HAVING ( year = $get_this_year ) AND ( trading_type_id = 3 )";
			break;
		    case "this_year_tt_sell":
		    	$sql_having = "HAVING ( year = $get_this_year ) AND ( trading_type_id = 4 )";
		    	break;

			 // Month   
		    case "this_month":
		    	$sql_having = "HAVING ( month = $get_this_month ) ";
		    	break;
		    case "this_month_tt_buy":
			$sql_having = "HAVING ( month = $get_this_month ) AND ( trading_type_id = 3 )";
			break;
		    case "this_month_tt_sell":
		    	$sql_having = "HAVING ( month = $get_this_month ) AND ( trading_type_id = 4 )";
		    	break;

			// Day    
		    case "today":
		    	$sql_having = "HAVING ( day = $get_today ) ";
		    	break;
		    case "today_tt_buy":
			$sql_having = "HAVING ( day = $get_today ) AND ( trading_type_id = 3 )";
			break;
		    case "today_tt_sell":
		    	$sql_having = "HAVING ( day = $get_today ) AND ( trading_type_id = 4 )";
		    	break;		
        }

        switch ($config->database->adapter)
        {
            case "pdo_mysql":
            default:
               $sql ="
               	SELECT  
					iv.id AS id,
					iv.index_id AS index_id,
					iv.date AS date,
					iv.biller_id AS biller_id,
					iv.customer_id AS customer_id,
					iv.preference_id AS preference_id,
					iv.trading_type_id AS trading_type_id,
					iv.payment_type_id AS payment_type_id,
					iv.calculation_type_id AS calculation_type_id,
					iv.account_id AS account_id,
					iv.product_id AS product_id,

	                iv.quantity AS quantity,
	                iv.unit_price AS unit_price,
	                iv.charge AS charge,
	                iv.total AS total,
	                iv.payable_amount AS payable_amount,
	                iv.spell_number AS spell_number,
	                iv.note AS note,

					a.name AS customer_detail_2,
					a.payee,
					a.bank,
					a.account_no,
	                (SELECT CONCAT(a.payee,'@',a.bank,'@',a.account_no)) AS account_detail,

	                b.name AS biller,

	                c.name,
	                c.attention,
	                c.id_no,
	                c.mobile_phone,
	                c.phone,
	                c.fax,
	                (SELECT CONCAT(c.name,'-',c.attention,'-',c.id_no,'-',c.mobile_phone,'-',c.phone,'-',c.fax)) AS customer_detail,

	                ct.description AS calculation_type,

	                p.code AS product,

			       	pt.pt_description AS payment_type,

	                pf.pref_description AS preference,
	                pf.status AS status,

			       	tt.description AS trading_type,

	                DATE_FORMAT(date,'%Y-%m-%d %H:%i:%S') AS date,
			       	DATE_FORMAT(date,'%Y-%m-%d') AS date_between,
					DATE_FORMAT(date,'%Y') AS year,
			       	DATE_FORMAT(date,'%Y%m') AS month,
			       	DATE_FORMAT(date,'%Y%m%d') AS day

                FROM   ".TB_PREFIX."invoices_tt iv
                LEFT JOIN " . TB_PREFIX . "accounts a ON a.serial_no = iv.account_id
                LEFT JOIN " . TB_PREFIX . "biller b ON b.id = iv.biller_id
                LEFT JOIN " . TB_PREFIX . "customers c ON c.customer_no = iv.customer_id
                LEFT JOIN " . TB_PREFIX . "calculation_types ct ON ct.id = iv.calculation_type_id
                LEFT JOIN " . TB_PREFIX . "currencys_tt p ON p.id = iv.product_id
                LEFT JOIN " . TB_PREFIX . "preferences pf ON pf.pref_id = iv.preference_id
			    LEFT JOIN " . TB_PREFIX . "payment_types pt ON pt.pt_id = iv.payment_type_id
			    LEFT JOIN " . TB_PREFIX . "trading_types tt ON tt.id = iv.trading_type_id
                $where
                GROUP BY
                    id
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

	/**
    * Function: are_there_any
    * 
    * Used to see if there are any invoices in the database for a given domain
    **/
    public static function are_there_any()
    {
	    global $auth_session;

		$sql = "SELECT count(*) as count FROM ".TB_PREFIX."invoices where domain_id = :domain_id limit 2";
		$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id);

        $count = $sth->fetch();
        return $count['count'];
    }

    /**
    * Function invoice::max
    * 
    * Used to get the max invoice id
    **/
    public static function max() {
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
}
