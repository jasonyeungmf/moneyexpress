<?php

if(LOGGING) {
	//Logging connection to prevent mysql_insert_id problems. Need to be called before the second connect...
	$log_dbh = db_connector();
}

$dbh = db_connector();

/*
 * TODO - remove this code - mysql 5 only 
if ($db_server == 'mysql') {
	//SC: May not really be 5...
	$mysql = 5;
}
*/

function db_connector() {

	global $config;
	/*
	* strip the pdo_ section from the adapter
	*/
	$pdoAdapter = substr($config->database->adapter, 4);
	
	if(!defined('PDO::MYSQL_ATTR_INIT_COMMAND') AND $pdoAdapter == "mysql" AND $config->database->adapter->utf8 == true)
	{ 
        simpleInvoicesError("PDO::mysql_attr");
	}

	try
	{
		
		switch ($pdoAdapter) 
		{

		    case "pgsql":
		    	$connlink = new PDO(
					$pdoAdapter.':host='.$config->database->params->host.';	dbname='.$config->database->params->dbname,	$config->database->params->username, $config->database->params->password
				);
		    	break;
		    	
		    case "sqlite":
		    	$connlink = new PDO(
					$pdoAdapter.':host='.$config->database->params->host.';	dbname='.$config->database->params->dbname,	$config->database->params->username, $config->database->params->password
				);
				break;
			
		    case "mysql":
                switch ($config->database->utf8)
                {
                    case true:
    
        			   	$connlink = new PDO(
        					'mysql:host='.$config->database->params->host.'; port='.$config->database->params->port.'; dbname='.$config->database->params->dbname, $config->database->params->username, $config->database->params->password,  array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;")
        				);
		        		break;
				
        		    case false:
		            default:
        		    	$connlink = new PDO(
        					$pdoAdapter.':host='.$config->database->params->host.'; port='.$config->database->params->port.'; dbname='.$config->database->params->dbname,	$config->database->params->username, $config->database->params->password
		        		);
    				break;
                }
    	    	break;

		}
		
		
	}
	catch( PDOException $exception )
	{
		simpleInvoicesError("dbConnection",$exception->getMessage());
		die($exception->getMessage());
	}
			
			
	return $connlink;
}

function mysqlQuery($sqlQuery) {
	dbQuery($sqlQuery);
}

/*
 * dbQuery is a variadic function that, in its simplest case, functions as the
 * old mysqlQuery does.  The added complexity comes in that it also handles
 * named parameters to the queries.
 *
 * Examples:
 *  $sth = dbQuery('SELECT b.id, b.name FROM ".TB_PREFIX."biller b WHERE b.enabled');
 *  $tth = dbQuery('SELECT c.name FROM ".TB_PREFIX."customers c WHERE c.id = :id',
 *                 ':id', $id);
 */

function dbQuery($sqlQuery) {
	global $dbh;
	$argc = func_num_args();
	$binds = func_get_args();
	$sth = false;
	// PDO SQL Preparation
	$sth = $dbh->prepare($sqlQuery);
	if ($argc > 1) {
		array_shift($binds);
		for ($i = 0; $i < count($binds); $i++) {
			$sth->bindValue($binds[$i], $binds[++$i]);
		}
	}
	/*
	// PDO Execution
	if($sth && $sth->execute()) {
		//dbLogger($sqlQuery);
	} else {
		echo "Dude, what happened to your query?:<br /><br /> ".htmlsafe($sqlQuery)."<br />".htmlsafe(end($sth->errorInfo()));
	// Earlier implementation did not return the $sth on error
	}
// $sth now has the PDO object or false on error.
	*/
	try {	
		$sth->execute();
	} catch(Exception $e){
		echo $e->getMessage();
		echo "dbQuery: Dude, what happened to your query?:<br /><br /> ".htmlsafe($sqlQuery)."<br />".htmlsafe(end($sth->errorInfo()));
	}
	
	return $sth;
	//$sth = null;
}

// Used for logging all queries
function dbLogger($sqlQuery) {
	global $log_dbh;
	global $dbh;
	global $auth_session;
	
	$userid = $auth_session->id;
	if(LOGGING && (preg_match('/^\s*select/iD',$sqlQuery) == 0)) {
		// Only log queries that could result in data/database  modification

		$last = null;
		$tth = null;
		$sql = "INSERT INTO ".TB_PREFIX."log (timestamp, userid, sqlquerie, last_id) VALUES (CURRENT_TIMESTAMP , ?, ?, ?)";

		/* SC: Check for the patch manager patch loader.  If a
		 *     patch is being run, avoid $log_dbh due to the
		 *     risk of deadlock.
		 */
		$call_stack = debug_backtrace();
		//SC: XXX Change the number back to 1 if returned to directly
		//    within dbQuery.  The joys of dealing with the call stack.

		if ($call_stack[2]['function'] == 'run_sql_patch') {
		/* Running the patch manager, avoid deadlock */
			$tth = $dbh->prepare($sql);
		} elseif (preg_match('/^(update|insert)/iD', $sqlQuery)) {
			$last = lastInsertId();
			$tth = $log_dbh->prepare($sql);
		} else {
			$tth = $log_dbh->prepare($sql);
		}
		$tth->execute(array($userid, trim($sqlQuery), $last));
		$tth = null;
	}
}

/*
 * lastInsertId returns the id of the most recently inserted row by the session
 * used by $dbh whose id was created by AUTO_INCREMENT (MySQL) or a sequence
 * (PostgreSQL).  This is a convenience function to handle the backend-
 * specific details so you don't have to.
 *
 */
function lastInsertId() {
	global $config;
	global $dbh;
	$pdoAdapter = substr($config->database->adapter, 4);
	
	if ($pdoAdapter == 'pgsql') {
		$sql = 'SELECT lastval()';
	} elseif ($pdoAdapter == 'mysql') {
		$sql = 'SELECT last_insert_id()';
	}
	//echo $sql;
	$sth = $dbh->prepare($sql);
	$sth->execute();
	return $sth->fetchColumn();
}

/*
 * _invoice_check_fk performs some manual FK checks on tables that the invoice
 *     table refers to.   Under normal conditions, this function will return
 *     true.  Returning false indicates that if the INSERT or UPDATE were to
 *     proceed, bad data could be written to the database.
 */

// In every instance of insertion into / updation  of the invoice table, we only pick from dropdown boxes which are sourced from the respective lookup tables.
// Hence is this function necessary to be used at all?

function _invoice_check_fk($biller, $customer, $preference) {
	global $dbh;

	//Check biller
	$sth = $dbh->prepare('SELECT count(id) FROM '.TB_PREFIX.'biller WHERE id = :id');
	$sth->execute(array(':id' => $biller));
	if ($sth->fetchColumn() == 0) { return false; }
	
	//Check customer
	$sth = $dbh->prepare('SELECT count(id) FROM '.TB_PREFIX.'customers WHERE id = :id');
	$sth->execute(array(':id' => $customer));
	if ($sth->fetchColumn() == 0) { return false; }
	
	//Check preferences
	$sth = $dbh->prepare('SELECT count(pref_id) FROM '.TB_PREFIX.'preferences WHERE pref_id = :id');
	$sth->execute(array(':id' => $preference));
	if ($sth->fetchColumn() == 0) { return false; }
	
	//All good
	return true;
}

/*
 * _invoice_items_check_fk performs some manual FK checks on tables that the
 *     invoice items table refers to.   Under normal conditions, this function
 *     will return true.  Returning false indicates that if the INSERT or
 *     UPDATE were to proceed, bad data could be written to the database.
 */
function _invoice_items_check_fk($invoice, $currency, $update) {
	global $dbh;

	//Check invoice
	if (is_null($update) || !is_null($invoice)) {
		$sth = $dbh->prepare('SELECT count(id) FROM '.TB_PREFIX.'invoices WHERE id = :id');
		$sth->execute(array(':id' => $invoice));
		if ($sth->fetchColumn() == 0) { return false; }
	}
	
	//Check currencys_note
	$sth = $dbh->prepare('SELECT count(id) FROM '.TB_PREFIX.'currencys_note WHERE id = :id');
	$sth->execute(array(':id' => $currency));
	if ($sth->fetchColumn() == 0) { return false; }
	
	//All good
	return true;
}

function getSQLPatches() {
	global $dbh;
	
	$sql = "SELECT * FROM ".TB_PREFIX."sql_patchmanager ORDER BY sql_release";                  
	$sth = dbQuery($sql) or die(htmlsafe(end($dbh->errorInfo())));
	return $sth->fetchAll();
}

function getCustomFieldLabels() {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."custom_fields WHERE domain_id = :domain_id ORDER BY cf_custom_field";
	$sth = dbQuery($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	for($i=0;$customField = $sth->fetch();$i++) {
		$customFields[$customField['cf_custom_field']] = $customField['cf_custom_label'];

		if($customFields[$customField['cf_custom_field']] == null) {
			//If not set, don't show...
			$customFields[$customField['cf_custom_field']] = $LANG["custom_field"].' '.($i%4+1);
		}
	}

	return $customFields;
}

function getInvoiceTotal($invoice_id) {
	global $LANG;
	
	$sql ="SELECT SUM(total) AS total FROM ".TB_PREFIX."invoice_items WHERE invoice_id =  :invoice_id";
	$sth = dbQuery($sql, ':invoice_id', $invoice_id);
	$res = $sth->fetch();
	return $res['total'];
}

function setInvoiceStatus($invoice, $status){
	global $dbh;

	$sql = "UPDATE " . TB_PREFIX . "invoices SET status_id =  :status WHERE id =  :id";
	$sth  = dbQuery($sql, ':status', $status, ':id', $invoice) or die(htmlsafe(end($dbh->errorInfo())));
}

function getInvoice($id) {
	global $dbh;
	global $config;
	global $auth_session; 
	
	$sql = "SELECT * FROM ".TB_PREFIX."invoices WHERE id =  :id and domain_id =  :domain_id";
	//echo $sql;
	
	$sth  = dbQuery($sql, ':id', $id, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));

	//print_r($query);
	$invoice = $sth->fetch();
	
	//print_r($invoice);
	//exit();
	
	$invoice['calc_date'] = date('Y-m-d', strtotime( $invoice['date'] ) );
//	$invoice['date'] = siLocal::date( $invoice['date'] );
	$invoice['total'] = getInvoiceTotal($invoice['id']);
	$invoice['subtotal'] = invoice::getInvoiceGross($invoice['id']);
	$invoice['charge'] = invoice::getInvoiceCharge($invoice['id']);

	return $invoice;
}

function getInvoices($sth) {
	global $config;
	$invoice = null;

	if($invoice = $sth->fetch()) {

		$invoice['calc_date'] = date( 'Y-m-d', strtotime( $invoice['date'] ) );
		$invoice['date'] = siLocal::date($invoice['date']);
			
		#invoice total total - start
		$invoice['total'] = getInvoiceTotal($invoice['id']);
		#invoice total total - end
	}
	return $invoice;
}

function setStatusExtension($extension_id, $status=2) {
	global $dbh;
	global $auth_session;

	//status=2 = toggle status
	if ($status == 2) {
		$sql = "SELECT enabled FROM ".TB_PREFIX."extensions WHERE id = :id AND domain_id = :domain_id LIMIT 1";
		$sth = dbQuery($sql,':id', $extension_id, ':domain_id', $auth_session->domain_id ) or die(htmlsafe(end($dbh->errorInfo())));
		$extension_info = $sth->fetch();
		$status = 1 - $extension_info['enabled'];
	}

	$sql = "UPDATE ".TB_PREFIX."extensions SET enabled =  :status WHERE id =  :id AND domain_id =  :domain_id LIMIT 1"; 
	if (dbQuery($sql, ':status', $status,':id', $extension_id, ':domain_id', $auth_session->domain_id)) {
		return true;
	}
	return false;
}

function getExtensionID($extension_name = "none") {

	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."extensions WHERE name LIKE  :extension_name AND (domain_id =  0 OR domain_id = :domain_id ) ORDER BY domain_id DESC LIMIT 1";
	$sth = dbQuery($sql,':extension_name', $extension_name, ':domain_id', $auth_session->domain_id ) or die(htmlsafe(end($dbh->errorInfo())));
	$extension_info = $sth->fetch();
	if (! $extension_info) { return -2; }			// -2 = no result set = extension not found
	if ($extension_info['enabled'] == 0) { return -1; }	// -1 = extension not enabled
	return $extension_info['id'];				//  0 = core, >0 is extension id
}

function insertInvoice() {
	global $dbh;
	global $db_server;
	global $auth_session;
	
	if ($db_server == 'mysql' && !_invoice_check_fk($_POST['biller_id'], $_POST['customer_id'],$_POST['preference_id'])) {
		return null;
	}
	$sql = "INSERT 
			INTO
		".TB_PREFIX."invoices (
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
	
	//echo $sql;
    $pref_group=getPreference($_POST[preference_id]);

	$sth= dbQuery($sql,
		#':index_id', index::next('invoice',$pref_group[index_group],$_POST[biller_id]),
		#':index_id', index::next('invoice',$pref_group[index_group]),
		':index_id', $_POST[index_id],
		':domain_id', $auth_session->domain_id,
		':biller_id', $_POST[biller_id],
		':customer_id', $_POST[customer_id],
		':preference_id', $_POST[preference_id],
		':trading_type_id', $_POST[trading_type_id],
		':date', $_POST[date],
		':note', $_POST[note]
		);

    #index::increment('invoice',$pref_group[index_group],$_POST[biller_id]);
    index::increment('invoice',$pref_group[index_group]);
    return $sth;
}

function updateInvoice($invoice_id) {
    global $logger;
	if ($db_server == 'mysql' && !_invoice_check_fk($_POST['biller_id'], $_POST['customer_id'],$_POST['preference_id']))
	{
		return null;
	}
	
	//index_id is NB...(buy) or NS...(sell) when trading type change.
	//if($_POST['trading_type_id'] == 1){
	//	$index_id = "B".substr($_POST['index_id'],1);
	//}
	//if($_POST['trading_type_id'] == 2){
	//	$index_id = "S".substr($_POST['index_id'],1);
	//}
	
	$sql = "UPDATE
			".TB_PREFIX."invoices
		SET
			index_id = :index_id,
			biller_id = :biller_id,
			customer_id = :customer_id,
			preference_id = :preference_id,
			trading_type_id = :trading_type_id,
			date = :date,
			note = :note
		WHERE
			id = :invoice_id";
			
	return dbQuery($sql,
        ':index_id', $_POST['index_id'],
		//':index_id', $index_id,//W.F. Yang
		':biller_id', $_POST['biller_id'],
		':customer_id', $_POST['customer_id'],
		':preference_id', $_POST['preference_id'],
		':trading_type_id', $_POST['trading_type_id'],
		':date', $_POST['date'],
		':note', $_POST['note'],
		':invoice_id', $invoice_id
		);
		echo $index_id;
}

function insertInvoiceItem(	$invoice_id,
							$trading_type_id,
							$description,
							$currency_id,
							$quantity,
							$unit_price,
							$charge,
							$note_cost,
							$line_number
							){

	global $logger;
	global $LANG;

	$logger->log(' ', Zend_Log::INFO);
	$logger->log(' ', Zend_Log::INFO);
	//$logger->log('Invoice: '.$invoice_id.' Tax '.$line_item_tax_id.' for line item '.$line_number.': '.$tax_total, Zend_Log::INFO);
	$logger->log('Description: '.$description, Zend_Log::INFO);
	$logger->log(' ', Zend_Log::INFO);

	$subtotal = $unit_price * $quantity;
	$total = $subtotal + $charge;	

	//Remove jquery auto-fill description - refer jquery.conf.js.tpl autofill section
	if ($description == $LANG['description'])
	{	
		$description ="";
	}

	if ($db_server == 'mysql' && !_invoice_items_check_fk($invoice_id,$currency_id)) {
		return null;
	}
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
				:note_cost
			)";

	dbQuery($sql,
		':invoice_id', $invoice_id,
		':trading_type_id', $trading_type_id,
		':description', $description,
		':currency_id', $currency_id,
		':quantity', $quantity,
		':unit_price', $unit_price,
		':subtotal', $subtotal,
		':charge', $charge,
		':total', $total,
		':note_cost', $note_cost
		);
	return true;
}

function updateInvoiceItem($line_number,$trading_type_id,$description,$currency_id,$quantity,$unit_price,$charge,$note_cost,$id)
{
	global $logger;
	global $LANG;
	$logger->log('Invoice: '.$invoice_id.' for line item '.$line_number, Zend_Log::INFO);
	$logger->log('Description: '.$description, Zend_Log::INFO);
	$logger->log(' ', Zend_Log::INFO);

	//line item subtotal
	$subtotal = $unit_price * $quantity;

	//line item total
	$total = $subtotal + $charge;	

	//Remove jquery auto-fill description - refer jquery.conf.js.tpl autofill section
	if ($description == $LANG['description'])
	{	
		$description ="";
	}

	if ($db_server == 'mysql' && !_invoice_items_check_fk(null, $currency_id, 'update'))
	{
		return null;
	}

	$sql = "UPDATE ".TB_PREFIX."invoice_items SET	
		trading_type_id = :trading_type_id,
		description = :description,
		currency_id = :currency_id,
		quantity =  :quantity,
		unit_price = :unit_price,
		subtotal = :subtotal,
		charge = :charge,
		total = :total,
		note_cost = :note_cost
	WHERE
		id = :id";
	
	dbQuery($sql,		
		':id', $id,
		':trading_type_id', $trading_type_id,
		':description', $description,
		':currency_id', $currency_id,
		':quantity', $quantity,
		':unit_price', $unit_price,
		':subtotal', $subtotal,
		':charge', $charge,
		':total', $total,
		':note_cost', $note_cost
		);

	//if from a new invoice item in the edit page user lastInsertId()
	($id == null) ? $id = lastInsertId() : $id  =$id ;
	//invoice_item_tax($id,$line_item_tax_id,$unit_price,$quantity,"update");

	return true;
}

/*
 * delete attempts to delete rows from the database.  This function currently
 * allows for the deletion of invoices, invoice_items, and products entries,
 * all other $module values will fail.  $idField is also checked on a per-table
 * basis, i.e. invoice_items can be either "id" or "invoice_id" while products
 * can only be "id".
 *
 * Invalid $module or $idFields values return false, as do calls that would fail
 * foreign key checks.  Otherwise, the value returned by dbQuery's deletion
 * attempt is returned.
 */

function delete($module,$idField,$id) {
	global $dbh;
	global $logger;
	global $auth_session; //TODO add some domain_id stuff in here if requried

	$lctable = strtolower($module);
	$s_idField = ''; // Presetting the whitelisted column to fail 

	/*
	 * SC: $valid_tables contains the base names of all tables that can
	 *     have rows deleted using this function.  This is used for
	 *     whitelisting deletion targets.
	 */
	$valid_tables = array('invoices', 'invoice_items', 'currencys');

if (in_array($lctable, $valid_tables)) {
	// A quick once-over on the dependencies of the possible tables
	if($lctable == 'invoice_items'){
		// Not required by any FK relationships
		if(!in_array($idField, array('id', 'invoice_id'))){
			// Fail, invalid identity field
			return false;
		}
		else{$s_idField = $idField;}
	}
		
	elseif($lctable == 'currencys'){
		// Check for use of currency
		$sth = $dbh->prepare('SELECT count(*) FROM '.TB_PREFIX.'invoice_items WHERE currency_id = :id');
		$sth->execute(array(':id' => $id));
		$ref = $sth->fetch();
		if($sth->fetchColumn() != 0) {
			// Fail, currency still in use
			return false;
		}
		$sth = null;
		if(!in_array($idField, array('id'))){
			// Fail, invalid identity field
			return false;
		}
		else{
			$s_idField = $idField;
		}
	}
		
	elseif($lctable == 'invoices'){
		// Check for existant payments and line items
		$sth = $dbh->prepare('SELECT count(*) FROM (SELECT id FROM '.TB_PREFIX.'invoice_items WHERE invoice_id = :id) x');
		$sth->execute(array(':id' => $id));
		if($sth->fetchColumn() != 0){
			// Fail, line items or payments still exist
			return false;
		}
		$sth = null;
		//SC: Later, may accept other values for $idField
		if(!in_array($idField, array('id'))){
			// Fail, invalid identity field
			return false;
		}
		else{
			$s_idField = $idField;
		}
	}
		
	else{
		// Fail, no checks for this table exist yet
		return false;
	}
} 

else{
	// Fail, invalid table name
	return false;
}

if($s_idField == ''){
	// Fail, column whitelisting not performed
	return false;
}
	
	// Tablename and column both pass whitelisting and FK checks
	$sql = "DELETE FROM ".TB_PREFIX."$module WHERE $s_idField = :id";
    $logger->log("Item deleted: ".$sql, ZEND_Log::INFO);
	return dbQuery($sql, ':id', $id);
}

function maxInvoice() {

	global $LANG;	
	
	$sql = "SELECT max(id) as maxId FROM ".TB_PREFIX."invoices";

	$sth = dbQuery($sql);
	return $sth->fetch();
	
//while ($Array_max = mysql_fetch_array($result_max) ) {
//$max_invoice_id = $Array_max['max_inv_id'];
};

//in this file are functions for all sql queries
function checkTableExists($table = "" ) {

	//$db = db::getInstance();
	//var_dump($db);
	$table == "" ? TB_PREFIX."biller" : $table;
	
  //  echo $table;
	global $LANG;
	global $dbh;
	global $config;
	switch ($config->database->adapter) 
	{

		case "pdo_pgsql":
			$sql = 'SELECT 1 FROM pg_tables WHERE tablename = '.$table.' LIMIT 1';
			break;

		case "pdo_sqlite":
			$sql = 'SELECT * FROM '.$table.'LIMIT 1';
			break;
		case "pdo_mysql":
		default:
		//mysql
			//$sql = "SELECT 1 FROM INFORMATION_SCHEMA.TABLES where table_name = :table LIMIT 1";
			$sql = "SHOW TABLES LIKE '".$table."'";
			break;
	}

	//$sth = $dbh->prepare($sql);
	$sth = dbQuery($sql);
	if ($sth->fetchAll())
	{
		return true;
	} else {
		return false;
	}

}

function checkFieldExists($table,$field) {

	global $LANG;
	global $dbh;
	global $db_server;
	
	$sql = "SELECT 1 FROM INFORMATION_SCHEMA.COLUMNS WHERE column_name = :field AND table_name = :table LIMIT 1";
	if ($db_server == 'pgsql') {
		// Use a nicer syntax
		$sql = "SELECT 1 FROM pg_attribute a INNER JOIN pg_class c ON (a.attrelid = c.oid)  WHERE c.relkind = 'r' AND c.relname = :table AND a.attname = :field AND NOT a.attisdropped AND a.attnum > 0 LIMIT 1";
	}

	$sth = $dbh->prepare($sql);
	
	if ($sth && $sth->execute(array(':field' => $field, ':table' => $table))) {
		if ($sth->fetch()) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function checkDataExists()
{
	$test = getNumberOfDoneSQLPatches();
	if ($test > 0 ){
		return true;
	} else {
		return false;
	}
}

function getURL()
{
	global $config;

	$port = "";
	$dir = dirname($_SERVER['PHP_SELF']);
	//remove incorrenct slashes for WinXP etc.
 $dir = str_replace('\\','',$dir);
 
	//set the port of http(s) section
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {
		$_SERVER['FULL_URL'] = "https://";
	} else {
		$_SERVER['FULL_URL'] = "http://";

	}

	$_SERVER['FULL_URL'] .= $config->authentication->http.$_SERVER['HTTP_HOST'].$dir;

	return $_SERVER['FULL_URL'];

}
function urlPDF($invoiceID) {
	
	$url = getURL();
//	html2ps does not like &amp; and htmlcharacters encoding - latter useless since InvoiceID comes from an integer field	
//	$script = "/index.php?module=invoices&amp;view=templates/template&amp;invoice=".htmlsafe($invoiceID)."&amp;action=view&amp;location=pdf";
	$script = "/index.php?module=invoices&view=template&id=$invoiceID&action=view&location=pdf";

	$full_url=$url.$script;
	
	return $full_url;
}

function sql2array($strSql) { 
	global $dbh;
    $sqlInArray = null; 
 
    $result_strSql = dbQuery($strSql); 
 
    for($i=0;$sqlInRow = PDOStatement::fetchAll($result_strSql);$i++) { 
 
        $sqlInArray[$i] = $sqlInRow; 
    } 
    return $sqlInArray; 
}


function getNumberOfDoneSQLPatches() {

	$check_patches_sql = "SELECT count(sql_patch) AS count FROM ".TB_PREFIX."sql_patchmanager ";
	$sth = dbQuery($check_patches_sql) or die(htmlsafe(end($dbh->errorInfo())));
		
	$patches = $sth->fetch();
	
	//Returns number of patches applied
	return $patches['count'];
}


function pdfThis($html,$file_location="",$pdfname)
{

	global $config;

//	set_include_path("../../../../library/pdf/");
	require_once('./library/pdf/config.inc.php');
	require_once('./library/pdf/pipeline.factory.class.php');
	require_once('./library/pdf/pipeline.class.php');
	parse_config_file('./library/pdf/html2ps.config');
	
	require_once("./include/init.php");	// for getInvoice() and getPreference()
	#$invoice_id = $_GET['id'];
	#$invoice = getInvoice($invoice_id);

	#$preference = getPreference($invoice['preference_id']);
	#$pdfname = trim($preference['pref_inv_wording']) . $invoice_id;

	#error_reporting(E_ALL);
	#ini_set("display_errors","1");
	#@set_time_limit(10000);

	/**
	 * Runs the HTML->PDF conversion with default settings
	 *
	 * Warning: if you have any files (like CSS stylesheets and/or images referenced by this file,
	 * use absolute links (like http://my.host/image.gif).
	 *
	 * @param $path_to_html String path to source html file.
	 * @param $path_to_pdf  String path to file to save generated PDF to.
	 */
	if(!function_exists(convert_to_pdf))
	{
		function convert_to_pdf($html_to_pdf, $pdfname, $file_location="") {

			global $config;
		  
			$destination = $file_location=="download" ? "DestinationDownload" : "DestinationFile";
		  /**
		   * Handles the saving generated PDF to user-defined output file on server
		   */

		 if(!class_exists(MyFetcherLocalFile))
		 {
		  class MyFetcherLocalFile extends Fetcher {
			var $_content;

			function MyFetcherLocalFile($html_to_pdf) {
			  //$this->_content = file_get_contents($file);
			  $this->_content = $html_to_pdf;
			}

			function get_data($dummy1) {
			  return new FetchedDataURL($this->_content, array(), "");
			}

			function get_base_url() {
			  return "";
			}
		  }
		 }

		  $pipeline = PipelineFactory::create_default_pipeline("", // Attempt to auto-detect encoding
															   "");

		  // Override HTML source 
		  $pipeline->fetchers[] = new MyFetcherLocalFile($html_to_pdf);

		  $baseurl = "";
		  $media = Media::predefined($config->export->pdf->papersize);
		  $media->set_landscape(false);

		  global $g_config;
		  $g_config = array(
							'cssmedia'     => 'screen',
							'renderimages' => true,
							'renderlinks'  => true,
							'renderfields' => true,
							'renderforms'  => false,
							'mode'         => 'html',
							'encoding'     => '',
							'debugbox'     => false,
							'pdfversion'    => '1.4',

							'process_mode'     => 'single',
							//'output'     => 1,
							//'location'     => 'pdf',
							'pixels'    => $config->export->pdf->screensize,
							'media'     => $config->export->pdf->papersize,
							'margins'   => array(
							  'left'    => $config->export->pdf->leftmargin,
							  'right'   => $config->export->pdf->rightmargin,
							  'top'     => $config->export->pdf->topmargin,
							  'bottom'  => $config->export->pdf->bottommargin,
							      ),
							'transparency_workaround'     => 1,
							'imagequality_workaround'     => 1,

							'draw_page_border' => false
							);

			$media->set_margins($g_config['margins']);
			$media->set_pixels($config->export->pdf->screensize);
			$media = Media::predefined('A4');
			 
	/*
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 	// Date in the past

	header("Location: $myloc");
	*/
		  global $g_px_scale;
		  $g_px_scale = mm2pt($media->width() - $media->margins['left'] - $media->margins['right']) / $media->pixels; 
		  global $g_pt_scale;
		  $g_pt_scale = $g_px_scale * 1.43; 

		  $pipeline->configure($g_config);
		  $pipeline->data_filters[] = new DataFilterUTF8("");
		  $pipeline->destination = new $destination($pdfname);
		  $pipeline->process($baseurl, $media);
		}
	}

	//echo "location: ".$file_location;
	convert_to_pdf($html, $pdfname, $file_location);
}

function previousid($currentid)
{
	global $logger;
	global $db;
	global $auth_session;
$previousquery = "SELECT * FROM ".TB_PREFIX."invoices WHERE id < $currentid AND domain_id=$auth_session->domain_id ORDER BY id DESC LIMIT 1"; 
	$previousresult = dbQuery($previousquery);
  	$previousrow = $previousresult->fetch();
  	$previousid  = $previousrow['id'];
	if($previousid)
	{	
		return $previousid;
	}
	else{
		return $currentid;
	}
}

function nextid($currentid)
{
	global $logger;
	global $db;
	global $auth_session;
$nextquery = "SELECT * FROM ".TB_PREFIX."invoices WHERE id > $currentid AND domain_id = $auth_session->domain_id ORDER BY id ASC LIMIT 1"; 
	$nextresult = dbQuery($nextquery);
	$nextrow = $nextresult->fetch();
	$nextid  = $nextrow['id'];
	if($nextid)
	{
		return $nextid;
	}
	else{
		return $currentid;
	}
}

function previousid_tt($currentid)
{
	global $logger;
	global $db;
	global $auth_session;
$previousquery = "SELECT * FROM ".TB_PREFIX."invoices_tt WHERE id < $currentid AND domain_id=$auth_session->domain_id ORDER BY id DESC LIMIT 1";
	$previousresult = dbQuery($previousquery);
  	$previousrow = $previousresult->fetch();
  	$previousid  = $previousrow['id'];
	if($previousid)
	{	
		return $previousid;
	}
	else{
		return $currentid;
	}
}

function nextid_tt($currentid)
{
	global $logger;
	global $db;
	global $auth_session;
$nextquery = "SELECT * FROM ".TB_PREFIX."invoices_tt WHERE id > $currentid AND domain_id = $auth_session->domain_id ORDER BY id ASC LIMIT 1"; 
	$nextresult = dbQuery($nextquery);
	$nextrow = $nextresult->fetch();
	$nextid  = $nextrow['id'];
	if($nextid)
	{
		return $nextid;
	}
	else{
		return $currentid;
	}
}