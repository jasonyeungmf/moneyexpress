<?php

class customer
{

    public static function get($customer_no)
    {
        
        global $db;
        global $auth_session;
        
        
        $sql = "SELECT * FROM ".TB_PREFIX."customers WHERE domain_id = :domain_id and customer_no = :customer_no";
        $sth = $db->query($sql,':domain_id', $auth_session->domain_id, ':customer_no', $customer_no ) or die(htmlsafe(end($dbh->errorInfo())));
    
        return $sth->fetch();
    }

    public static function get_all()
    {
        
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

	function insert() {
	
		global $db;
		$domain_id = domain_id::get($this->domain_id);

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
					:domain_id ,
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

		return $db->query($sql,
            ':domain_id',$domain_id,
            ':id_document', $this->id_document,
			':attention', $this->attention,
			':name', $this->name,
            ':id_no', $this->id_no,
			':street_address', $this->street_address,
			':street_address2', $this->street_address2,
			':city', $this->city,
			':state', $this->state,
			':zip_code', $this->zip_code,
			':country', $this->country,
			':phone', $this->phone,
			':mobile_phone', $this->mobile_phone,
			':fax', $this->fax,
			':email', $this->email,
            ':website', $this->website,
			':notes', $this->notes,
			':custom_field1', $this->custom_field1,
			':custom_field2', $this->custom_field2,
			':custom_field3', $this->custom_field3,
			':custom_field4', $this->custom_field4,
			':enabled', $this->enabled
			);
		
	}
    
}
