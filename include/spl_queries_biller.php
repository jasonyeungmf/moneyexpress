<?php
function insertBiller() {
	global $db_server;
	global $auth_session;
		
		$sql = "INSERT into
			".TB_PREFIX."biller
			(
				id, 
				domain_id, 
				name, 
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
				logo, 
				footer, 
				paypal_business_name, 
				paypal_notify_url, 
				paypal_return_url, 
				eway_customer_id, 
				notes, 
				custom_field1,
				custom_field2, 
				custom_field3, 
				custom_field4,
				enabled

			)
		VALUES
			(
				NULL,
				:domain_id,
				:name,
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
				:logo,
				:footer,
				:paypal_business_name,
				:paypal_notify_url,
				:paypal_return_url,
				:eway_customer_id,
				:notes,
				:custom_field1,
				:custom_field2,
				:custom_field3,
				:custom_field4,
				:enabled
			 )";

	return dbQuery($sql,
		':name', $_POST[name],
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
		':logo', $_POST[logo],
		':footer', $_POST[footer],
		':paypal_business_name', $_POST[paypal_business_name],
		':paypal_notify_url', $_POST[paypal_notify_url],
		':paypal_return_url', $_POST[paypal_return_url],
		':eway_customer_id', $_POST[eway_customer_id],
		':notes', $_POST[notes],
		':custom_field1', $_POST[custom_field1],
		':custom_field2', $_POST[custom_field2],
		':custom_field3', $_POST[custom_field3],
		':custom_field4', $_POST[custom_field4],
		':enabled', $_POST['enabled'],
		':domain_id', $auth_session->domain_id
		);
}

function updateBiller() {
	
	$sql = "UPDATE
				".TB_PREFIX."biller
			SET
				name = :name,
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
				logo = :logo,
				footer = :footer,
				paypal_business_name = :paypal_business_name,
				paypal_notify_url = :paypal_notify_url,
				paypal_return_url = :paypal_return_url,
				eway_customer_id = :eway_customer_id,
				notes = :notes,
				custom_field1 = :custom_field1,
				custom_field2 = :custom_field2,
				custom_field3 = :custom_field3,
				custom_field4 = :custom_field4,
				enabled = :enabled
			WHERE
				id = :id";
	return dbQuery($sql,
		':name', $_POST[name],
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
		':logo', $_POST[logo],
		':footer', $_POST[footer],
		':paypal_business_name', $_POST[paypal_business_name],
		':paypal_notify_url', $_POST[paypal_notify_url],
		':paypal_return_url', $_POST[paypal_return_url],
		':eway_customer_id', $_POST[eway_customer_id],
		':notes', $_POST[notes],
		':custom_field1', $_POST[custom_field1],
		':custom_field2', $_POST[custom_field2],
		':custom_field3', $_POST[custom_field3],
		':custom_field4', $_POST[custom_field4],
		':enabled', $_POST['enabled'],
		':id', $_GET[id]
		);
}

function getBiller($id) {
	global $LANG;
	global $dbh;
	global $auth_session;

	$print_biller = "SELECT * FROM ".TB_PREFIX."biller WHERE id = :id and domain_id = :domain_id";
	$sth = dbQuery($print_biller, ':id', $id, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	$biller = $sth->fetch();
	$biller['wording_for_enabled'] = $biller['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $biller;
}

function getBillers() {
	global $LANG;
	global $dbh;
	global $auth_session;
	
	$sql = "SELECT * FROM ".TB_PREFIX."biller WHERE domain_id = :domain_id ORDER BY name";
	$sth  = dbQuery($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	$billers = null;
	
	for($i=0;$biller = $sth->fetch();$i++) {
		
  		if ($biller['enabled'] == 1) {
  			$biller['enabled'] = $LANG['enabled'];
  		} else {
  			$biller['enabled'] = $LANG['disabled'];
  		}
		$billers[$i] = $biller;
	}
	
	return $billers;
}

function getActiveBillers() {
	global $dbh;
	global $db_server;
	global $auth_session;

	$sql = "SELECT * FROM ".TB_PREFIX."biller WHERE enabled != 0 and domain_id = :domain_id ORDER BY name";
	if ($db_server == 'pgsql') {
		$sql = "SELECT * FROM ".TB_PREFIX."biller WHERE enabled and domain_id = :domain_id ORDER BY name";
	}
	$sth = dbQuery($sql,':domain_id',$auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	return $sth->fetchAll();
}