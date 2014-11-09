<?php

function insertInvoiceTT() {
	global $dbh;
	global $db_server;
	global $auth_session;
	
	//if ($db_server == 'mysql' && !_invoice_tt_check_fk($_POST['biller_id'],$_POST['customer_id'],$_POST['preference_id'])) 
	//{
	//	return null;
	//}
	
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

    //$pref_group = getPreference($_POST[preference_id]);

	$sth = dbQuery($sql,
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

    //index::increment('invoice',$pref_group[index_group]);

    return $sth;
}

function updateInvoiceTT($id) {
    //global $logger;

	//if ($db_server == 'mysql' && !_invoice_tt_check_fk($_POST['biller_id'],$_POST['customer_id'],$_POST['preference_id']))
	//{
	//	return null;
	//}

	$sql = "UPDATE
			".TB_PREFIX."invoices_tt
		SET
			index_id = :index_id,
			biller_id = :biller_id,
			customer_id = :customer_id,
			preference_id = :preference_id,
			trading_type_id = :trading_type_id,
			payment_type_id = :payment_type_id,
			calculation_type_id = :calculation_type_id,
			account_id = :account_id,
			product_id = :product_id,
			date = :date,
			quantity = :quantity,
			unit_price = :unit_price,
			charge = :charge,
			total = :total,
			payable_amount = :payable_amount,
			spell_number = :spell_number,
			note = :note,
			custom_field1 = :customField1,
			custom_field2 = :customField2,
			custom_field3 = :customField3,
			custom_field4 = :customField4
		WHERE
			id = :id";
			
	return dbQuery($sql,
		':id', $id,
        ':index_id', $_POST['index_id'],
		':biller_id', $_POST['biller_id'],
		':customer_id', $_POST['customer_id'],
		':preference_id', $_POST['preference_id'],
		':trading_type_id', $_POST['trading_type_id'],
		':payment_type_id', $_POST['payment_type_id'],
		':calculation_type_id', $_POST['calculation_type_id'],
		':account_id', $_POST['account_id'],
		':product_id', $_POST['product_id'],
		':date', $_POST['date'],
		':quantity', $_POST['quantity'],
		':unit_price', $_POST['unit_price'],
		':charge', $_POST['charge'],
		':total', $_POST['total'],
		':payable_amount', $_POST['payable_amount'],
		':spell_number', $_POST['spell_number'],
		':note', $_POST['note'],
		':customField1', $_POST['customField1'],
		':customField2', $_POST['customField2'],
		':customField3', $_POST['customField3'],
		':customField4', $_POST['customField4']
		);
}

function getInvoiceTT($id) {
	global $dbh;
	global $config;
	global $auth_session; 
	
	$sql = "SELECT * FROM ".TB_PREFIX."invoices_tt WHERE id = :id and domain_id = :domain_id";
	$sth  = dbQuery($sql, ':id', $id, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$invoice = $sth->fetch();
	
	//$invoice['calc_date'] = date('Y-m-d', strtotime( $invoice['date'] ) );
	return $invoice;
}

/*
 * _invoice_tt_check_fk performs some manual FK checks on tables that the invoice
 *     table refers to.   Under normal conditions, this function will return
 *     true.  Returning false indicates that if the INSERT or UPDATE were to
 *     proceed, bad data could be written to the database.
 */

// In every instance of insertion into / updation  of the invoice table, 
// we only pick from dropdown boxes which are sourced from the respective lookup tables.
// Hence is this function necessary to be used at all?

function _invoice_tt_check_fk($biller, $customer, $preference) {
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
 * lastInsertId returns the id of the most recently inserted row by the session
 * used by $dbh whose id was created by AUTO_INCREMENT (MySQL) or a sequence
 * (PostgreSQL).  This is a convenience function to handle the backend-
 * specific details so you don't have to.
 *
 */
function lastInsertIdTT() {
	global $config;
	global $dbh;
	$pdoAdapter = substr($config->database->adapter, 4);

	if ($pdoAdapter == 'mysql') 
	{
		$sql = 'SELECT last_insert_id()';
	}
	$sth = $dbh->prepare($sql);
	$sth->execute();
	return $sth->fetchColumn();
}

function deleteInvoicesTT($module,$idField,$id) {
	global $dbh;
	global $logger;
	global $auth_session;

	$lctable = strtolower($module);
	$s_idField = ''; 

	$valid_tables = array('invoices_tt');

	if (in_array($lctable, $valid_tables)) {
		if ($lctable == 'invoices_tt') 
        {
			if (!in_array($idField, array('id'))) {
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
	$sql = "DELETE FROM ".TB_PREFIX."$module WHERE $s_idField = :id AND domain_id = :domain_id";
    $logger->log("Item deleted: ".$sql, ZEND_Log::INFO);
	return dbQuery($sql, ':id', $id, ':domain_id', $auth_session->domain_id);
}