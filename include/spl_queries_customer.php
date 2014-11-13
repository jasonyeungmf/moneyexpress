<?php
function updateCustomer() {
	global $db;
	global $config;

	//ugly hack with conditional sql - but couldn't get it working without this :(
	//TODO - make this just 1 query - refer svn history for info on past versions
	
	$sql = "UPDATE
				".TB_PREFIX."customers
			SET
				id_document = :id_document,
				attention = :attention,
				name = :name,
				id_no = :id_no,
				street_address = :street_address,
				street_address2 = :street_address2,
				city = :city,
				state = :state,
				zip_code = :zip_code,
				country = :country,
				phone = :phone,
				mobile_phone = :mobile_phone,
				fax = :fax,
				email = :email,
				website = :website,
				notes = :notes,
				custom_field1 = :custom_field1,
				custom_field2 = :custom_field2,
				custom_field3 = :custom_field3,
				custom_field4 = :custom_field4,
				enabled = :enabled
			WHERE
				customer_no = :customer_no";


	return $db->query($sql,

		':id_document', $_POST[id_document],
		':attention', $_POST[attention],
		':name', $_POST[name],
		':id_no', $_POST[id_no],
		':street_address', $_POST[street_address],
		':street_address2', $_POST[street_address2],
		':city', $_POST[city],
		':state', $_POST[state],
		':zip_code', $_POST[zip_code],
		':country', $_POST[country],
		':phone', $_POST[phone],
		':mobile_phone', $_POST[mobile_phone],
		':fax', $_POST[fax],
		':email', $_POST[email],
		':website', $_POST[website],
		':notes', $_POST[notes],
		':custom_field1', $_POST[custom_field1],
		':custom_field2', $_POST[custom_field2],
		':custom_field3', $_POST[custom_field3],
		':custom_field4', $_POST[custom_field4],
		':enabled', $_POST['enabled'],
		':customer_no', $_GET['customer_no']
		);
}

function insertCustomer() {
	global $db_server;
	global $auth_session;
    global $config;
	extract( $_POST );

	$sql = "INSERT INTO 
			".TB_PREFIX."customers
			(
				domain_id, 
				id_document,
				attention, 
				name, 
				id_no,
				street_address, 
				street_address2,
				city, 
				state, 
				zip_code, 
				country, 
				phone, 
				mobile_phone,
				fax, 
				email,
				website,
				notes,
				custom_field1, 
				custom_field2,
				custom_field3, 
				custom_field4, 
				enabled
			)
			VALUES 
			(
				:domain_id,
				:id_document,
				:attention, 
				:name, 
				:id_no,
				:street_address, 
				:street_address2,
				:city, 
				:state, 
				:zip_code, 
				:country, 
				:phone, 
				:mobile_phone,
				:fax, 
				:email, 
				:website,
				:notes, 
				:custom_field1, 
				:custom_field2,
				:custom_field3, 
				:custom_field4, 
				:enabled
			)";

	return dbQuery($sql,
		':domain_id',$auth_session->domain_id,
		':id_document', $id_document,
		':attention', $attention,
		':name', $name,
		':id_no', $id_no,
		':street_address', $street_address,
		':street_address2', $street_address2,
		':city', $city,
		':state', $state,
		':zip_code', $zip_code,
		':country', $country,
		':phone', $phone,
		':mobile_phone', $mobile_phone,
		':fax', $fax,
		':email', $email,
		':website', $website,
		':notes', $notes,
		':custom_field1', $custom_field1,
		':custom_field2', $custom_field2,
		':custom_field3', $custom_field3,
		':custom_field4', $custom_field4,
		':enabled', $enabled
		);
	
}

function searchCustomers($search) {
//TODO remove this function - note used anymore
	global $db_server;

	$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE name LIKE :search";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE name ILIKE :search";
	}
	$sth = dbQuery($sql, ':search', "%$search%");
	
	$customers = null;
	
	for($i=0; $customer = $sth->fetch(); $i++) {
		$customers[$i] = $customer;
	}
	//echo $sql;
	
	//print_r($customers);
	return $customers;
}

function getCustomer($customer_no) {
	global $db_server;
	global $dbh;
	global $auth_session;

	$print_customer = "SELECT * FROM ".TB_PREFIX."customers WHERE customer_no = :customer_no and domain_id = :domain_id";
	$sth = dbQuery($print_customer, ':customer_no', $customer_no, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetch();
}

function getCustomers() {
	global $dbh;
	global $LANG;
	global $auth_session;
	
	$customer = null;
	
	$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE domain_id = :domain_id";
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

	$customers = null;

	for($i=0; $customer = $sth->fetch(); $i++) {
		if ($customer['enabled'] == 1) {
			$customer['enabled'] = $LANG['enabled'];
		} else {
			$customer['enabled'] = $LANG['disabled'];
		}

		#invoice total calc - start
		$customer['total'] = calc_customer_total($customer['customer_no']);
		#invoice total calc - end

		#amount paid calc - start
		$customer['paid'] = calc_customer_paid($customer['customer_no']);
		#amount paid calc - end

		#amount owing calc - start
		$customer['owing'] = $customer['total'] - $customer['paid'];
		
		#amount owing calc - end
		$customers[$i] = $customer;

	}
	
	return $customers;
}

function getActiveCustomers() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
	
	
	$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE enabled != 0 and domain_id = :domain_id ORDER BY customer_no";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE enabled and domain_id = :domain_id ORDER BY customer_no";
	}
	$sth = dbQuery($sql,':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

	return $sth->fetchAll();
}

function deleteCustomer($module,$idField,$customer_no) {
	global $dbh;
	global $logger;
	global $auth_session;

	$lctable = strtolower($module);
	$s_idField = ''; 

	$valid_tables = array('customers');

	if (in_array($lctable, $valid_tables)) {
		if ($lctable == 'customers') 
        {
			if (!in_array($idField, array('customer_no'))) {
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
	$sql = "DELETE FROM ".TB_PREFIX."$module WHERE $s_idField = :customer_no";
    $logger->log("Item deleted: ".$sql, ZEND_Log::INFO);
	return dbQuery($sql, ':customer_no', $customer_no);
}

function insertCustomerFromExcel($domain_id,$id_document,$attention,$name,$id_no,$street_address,$street_address2,$city,$state,
	$zip_code,$country,$phone,$mobile_phone,$fax,$email,$website,$notes,
	$custom_field1,$custom_field2,$custom_field3,$custom_field4,$enabled){

	global $db_server;
	global $auth_session;
    global $config;
	extract( $_POST );

	$sql = "INSERT INTO 
			".TB_PREFIX."customers
			(
				domain_id, 
				id_document,
				attention, 
				name, 
				id_no,
				street_address, 
				street_address2,
				city, 
				state, 
				zip_code, 
				country, 
				phone, 
				mobile_phone,
				fax, 
				email,
				website,
				notes,
				custom_field1, 
				custom_field2,
				custom_field3, 
				custom_field4, 
				enabled
			)
			VALUES 
			(
				:domain_id,
				:id_document,
				:attention, 
				:name, 
				:id_no,
				:street_address, 
				:street_address2,
				:city, 
				:state, 
				:zip_code, 
				:country, 
				:phone, 
				:mobile_phone,
				:fax, 
				:email, 
				:website,
				:notes, 
				:custom_field1, 
				:custom_field2,
				:custom_field3, 
				:custom_field4, 
				:enabled
			)";

	return dbQuery($sql,
		':domain_id',$auth_session->domain_id,
		':id_document', $id_document,
		':attention', $attention,
		':name', $name,
		':id_no', $id_no,
		':street_address', $street_address,
		':street_address2', $street_address2,
		':city', $city,
		':state', $state,
		':zip_code', $zip_code,
		':country', $country,
		':phone', $phone,
		':mobile_phone', $mobile_phone,
		':fax', $fax,
		':email', $email,
		':website', $website,
		':notes', $notes,
		':custom_field1', $custom_field1,
		':custom_field2', $custom_field2,
		':custom_field3', $custom_field3,
		':custom_field4', $custom_field4,
		':enabled', $enabled
		);
	
}

function importFromExcel(){
	global $db_server;
	global $auth_session;
    global $config;
    extract( $_POST );

	require_once 'include/PHPExcel_1.7.9_doc/Classes/PHPExcel.php';
	require_once 'include/PHPExcel_1.7.9_doc/Classes/PHPExcel/IOFactory.php';
	require_once 'include/PHPExcel_1.7.9_doc/Classes/PHPExcel/Reader/Excel2007.php';
	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	$filename="excelfile/customer.xlsx";
	$objPHPExcel = $objReader->load($filename); 
	$sheet = $objPHPExcel->getSheet(0); 
	$highestRow = $sheet->getHighestRow(); 
	//$highestColumn = $sheet->getHighestColumn();

	for($j=2;$j<=$highestRow;$j++)
	{
	    $domain_id = $auth_session->domain_id;
	    $id_document = (string)$objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();
	    $attention = (string)$objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();
	    $name = (string)$objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();
	    $id_no = (string)$objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();
	    $street_address = (string)$objPHPExcel->getActiveSheet()->getCell("I".$j)->getValue();
	    $street_address2 = "";
	    $city = "";
	    $state = "";
	    $zip_code = "";
	    $country = "";
	    $phone = (string)$objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();
	    $mobile_phone = (string)$objPHPExcel->getActiveSheet()->getCell("G".$j)->getValue();
	    $fax = (string)$objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();
	    $email = (string)$objPHPExcel->getActiveSheet()->getCell("J".$j)->getValue();
	    $website = (string)$objPHPExcel->getActiveSheet()->getCell("K".$j)->getValue();
	    $notes = (string)$objPHPExcel->getActiveSheet()->getCell("L".$j)->getValue();
	    $custom_field1 = "";
	    $custom_field2 = "";
	    $custom_field3 = "";
	    $custom_field4 = "";
	    $enabled = 1;

	insertCustomerFromExcel($domain_id,$id_document,$attention,$name,$id_no,$street_address,$street_address2,$city,$state,
	$zip_code,$country,$phone,$mobile_phone,$fax,$email,$website,$notes,$custom_field1,$custom_field2,$custom_field3,$custom_field4,
	$enabled);	
	    
	//print_r($sql);
	//exit;
	}
}

function calc_customer_total_tt($customer_id) {
	global $LANG;
	global $dbh;

    $sql ="SELECT coalesce(sum(iv.total),  0) AS total FROM ".TB_PREFIX."invoices_tt iv WHERE iv.customer_id = :customer ";
	$sth = dbQuery($sql, ':customer', $customer_id) or die(end($dbh->errorInfo()));
	$invoice = $sth->fetch();

	return $invoice['total'];
}

function getCustomerInvoicesTT($id) {
	global $dbh;
	global $config;
	global $auth_session;

	$sql = "SELECT	
		i.id,
		i.index_id, 
		i.date,
		i.total
	FROM " . TB_PREFIX . "invoices_tt i
	WHERE 
		i.customer_id = :id and i.domain_id = :domain_id
	ORDER BY i.id DESC;";

	$sth = dbQuery($sql, ':id', $id, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

	$invoices = null;
	while ($invoice = $sth->fetch()) {
		$invoices[] = $invoice;
	}
	return $invoices;

}