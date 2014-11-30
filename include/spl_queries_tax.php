<?php
function insertTaxRate() {
  	global $auth_session;
	global $LANG;

	$sql = "INSERT into ".TB_PREFIX."tax
				(domain_id, tax_description, tax_percentage, type,  tax_enabled)
			VALUES
				(:domain_id, :description, :percent, :type, :enabled)";
	
	$display_block = $LANG['save_tax_rate_success'];
	if (!(dbQuery($sql,
		':domain_id', $auth_session->domain_id,
		':description', $_POST['tax_description'],
		':percent', $_POST['tax_percentage'],
		':type', $_POST['type'],
		':enabled', $_POST['tax_enabled']))) {
		$display_block = $LANG['save_tax_rate_failure'];
	}
	return $display_block;
}

function updateTaxRate() {
	global $LANG;
	global $auth_session;
	
	$sql = "UPDATE
				".TB_PREFIX."tax
			SET
				tax_description = :description,
				tax_percentage = :percentage,
				type = :type,
				tax_enabled = :enabled
			WHERE
				tax_id = :id
			AND
				domain_id = :domain_id
			";

	$display_block = $LANG['save_tax_rate_success'];
	if (!(dbQuery($sql,
		':description', $_POST['tax_description'],
	  	':percentage', $_POST['tax_percentage'],
	  	':enabled', $_POST['tax_enabled'],
	  	':id', $_GET['id'],
	  	':domain_id', $auth_session->domain_id,
	  	':type', $_POST['type']

		))) {
		$display_block = $LANG['save_tax_rate_failure'];
	}
	return $display_block;
}

function getTaxes() {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."tax WHERE domain_id = :domain_id ORDER BY tax_id";
	$sth = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$taxes = null;
	
	for($i=0;$tax = $sth->fetch();$i++) {
		if ($tax['tax_enabled'] == 1) {
			$tax['enabled'] = $LANG['enabled'];
		} else {
			$tax['enabled'] = $LANG['disabled'];
		}

		$taxes[$i] = $tax;
	}
	
	return $taxes;
}

function getTaxRate($id) {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."tax WHERE tax_id = :id and domain_id = :domain_id";
	$sth = dbQuery($sql, ':id', $id, ':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$tax = $sth->fetch();
	$tax['enabled'] = $tax['tax_enabled'] == 1 ? $LANG['enabled']:$LANG['disabled'];
	
	return $tax;
}
function getTaxTypes() {
	
	$types=  array(
                                '%' => '%',
                                '$' => '$',
								'+' => '+'
	);
	return $types;
}

function getActiveTaxes() {
	global $LANG;
	global $dbh;
	global $db_server;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."tax WHERE tax_enabled != 0 and domain_id = :domain_id ORDER BY tax_id";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."tax WHERE tax_enabled ORDER BY tax_description";
	}
	$sth = dbQuery($sql, ':domain_id',$auth_session->domain_id ) or die(htmlsafe(end($dbh->errorInfo())));
	
	$taxes = null;
	
	for($i=0;$tax = $sth->fetch();$i++) {
		if ($tax['tax_enabled'] == 1) {
			$tax['enabled'] = $LANG['enabled'];
		} else {
			$tax['enabled'] = $LANG['disabled'];
		}

		$taxes[$i] = $tax;
	}
	
	return $taxes;
}

/*
Function: taxesGroupedForInvoice
Purpose: to show a nice summary of total $ for tax for an invoice
*/
function taxesGroupedForInvoice($invoice_id)
{
	$sql = "select 
				tax.tax_description as tax_name, 
				sum(item_tax.tax_amount) as tax_amount,
				count(*) as count
			from 
				".TB_PREFIX."invoice_item_tax item_tax, 
				".TB_PREFIX."invoice_items item, 
				".TB_PREFIX."tax tax 
			where 
				item.id = item_tax.invoice_item_id 
				AND 
				tax.tax_id = item_tax.tax_id 
				AND 
				item.invoice_id = :invoice_id
				GROUP BY 
				tax.tax_id;";
	$sth = dbQuery($sql, ':invoice_id', $invoice_id) or die(htmlsafe(end($dbh->errorInfo())));
	$result = $sth->fetchAll();

	return $result;

}

/*
Function: taxesGroupedForInvoiceItem
Purpose: to show a nice summary of total $ for tax for an invoice item - used for invoice editing
*/
function taxesGroupedForInvoiceItem($invoice_item_id)
{
	$sql = "select 
				item_tax.id as row_id, 
				tax.tax_description as tax_name, 
				tax.tax_id as tax_id 
			from 
				".TB_PREFIX."invoice_item_tax item_tax, 
				".TB_PREFIX."tax tax 
			where 
				item_tax.invoice_item_id = :invoice_item_id 
				AND 
				tax.tax_id = item_tax.tax_id 
				ORDER BY 
				row_id ASC;";
	$sth = dbQuery($sql, ':invoice_item_id', $invoice_item_id) or die(htmlsafe(end($dbh->errorInfo())));
	$result = $sth->fetchAll();

	return $result;

}

/*
Function: getTaxesPerLineItem
Purpose: get the total tax for the line item
*/
function getTaxesPerLineItem($line_item_tax_id,$quantity, $unit_price)
{
	global $logger;

	foreach($line_item_tax_id as $key => $value) 
	{
		$logger->log("Key: ".$key." Value: ".$value, Zend_Log::INFO);
		$tax = getTaxRate($value);
		$logger->log('tax rate: '.$tax['tax_percentage'], Zend_Log::INFO);

		$tax_amount = lineItemTaxCalc($tax,$unit_price,$quantity);
		//get Total tax for line item
		$tax_total = $tax_total + $tax_amount;

		//$logger->log('Qty: '.$quantity.' Unit price: '.$unit_price, Zend_Log::INFO);
		//$logger->log('Tax rate: '.$tax[tax_percentage].' Tax type: '.$tax['tax_type'].' Tax $: '.$tax_amount, Zend_Log::INFO);

	}
	return $tax_total;
}

/*
Function: lineItemTaxCalc
Purpose: do the calc for the tax for tax x on line item y
*/
function lineItemTaxCalc($tax,$unit_price,$quantity)
{
	if($tax['type'] == "%")
	{
		$tax_amount = ( ($tax['tax_percentage'] / 100)  * $unit_price ) * $quantity;
	}
	if($tax['type'] == "$")
	{
		$tax_amount = $tax['tax_percentage'] * $quantity;
	}
	if($tax['type'] == "+")
	{
		$tax_amount = $tax['tax_percentage'];
	}
		
	return $tax_amount;
}

/*
Function: invoice_item_tax
Purpose: insert/update the multiple taxes per line item into the me_invoice_item_tax table
*/
function invoice_item_tax($invoice_item_id,$line_item_tax_id,$unit_price,$quantity,$action="") {
	
	global $logger;

	//if editing invoice delete all tax info then insert first then do insert again
	//probably can be done without delete - someone to look into this if required - TODO
	if ($action =="update")
	{

		$sql_delete = "DELETE from
							".TB_PREFIX."invoice_item_tax
					   WHERE
							invoice_item_id = :invoice_item_id";
		$logger->log("Invoice item: ".$invoice_item_id." tax lines deleted", Zend_Log::INFO);

		dbQuery($sql_delete,':invoice_item_id',$invoice_item_id);


	}

	foreach($line_item_tax_id as $key => $value) 
	{
		if($value !== "")
		{
			$tax = getTaxRate($value);

			$logger->log("ITEM :: Key: ".$key." Value: ".$value, Zend_Log::INFO);
			$logger->log('ITEM :: tax rate: '.$tax['tax_percentage'], Zend_Log::INFO);

			$tax_amount = lineItemTaxCalc($tax,$unit_price,$quantity);
			//get Total tax for line item
			$tax_total = $tax_total + $tax_amount;

			$logger->log('ITEM :: Qty: '.$quantity.' Unit price: '.$unit_price, Zend_Log::INFO);
			$logger->log('ITEM :: Tax rate: '.$tax[tax_percentage].' Tax type: '.$tax['type'].' Tax $: '.$tax_amount, Zend_Log::INFO);

			$sql = "INSERT 
						INTO 
					".TB_PREFIX."invoice_item_tax 
					(
						invoice_item_id, 
						tax_id, 
						tax_type, 
						tax_rate, 
						tax_amount
					) 
					VALUES 
					(
						:invoice_item_id, 
						:tax_id,
						:tax_type,
						:tax_rate,
						:tax_amount
					)";

			dbQuery($sql,
				':invoice_item_id', $invoice_item_id,
				':tax_id', $tax[tax_id],
				':tax_type', $tax[type],
				':tax_rate', $tax[tax_percentage],
				':tax_amount', $tax_amount
				);
		}
	}
	//TODO fix this
	return true;
}