<?php
/*
* Script: save.php
* 	Biller save page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;

#insert biller

$saved = false;

if ( $op === 'insert_user') {

    function insertUser() {
		global $auth_session;

        $sql = "INSERT INTO ".TB_PREFIX."user
                    (
                        email,
                        password,
                        role_id,
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
			website,
			logo,
			notes,
                        enabled
                    )
                    VALUES 
                    (
                        :email,
                        MD5(:password),
                        :role,
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
			:website,
			:logo,
			:notes,
			:enabled
                    )
                ";

        return dbQuery($sql,
		       ':email',$_POST['email'],
		       ':password',$_POST['password_field'],
		       ':role',$_POST['role'],
		       ':domain_id',$auth_session->domain_id,
		       ':name',$_POST['name'],
		       ':street_address',$_POST['street_address'],
		       ':street_address2',$_POST['street_address2'],
		       ':city',$_POST['city'],
		       ':state',$_POST['state'],
		       ':zip_code',$_POST['zip_code'],
		       ':country',$_POST['country'],
		       ':phone',$_POST['phone'],
		       ':mobile_phone',$_POST['mobile_phone'],
		       ':fax',$_POST['fax'],
		       ':website',$_POST['website'],
		       ':logo',$_POST['logo'],
		       ':notes',$_POST['notes'],
		       ':enabled',$_POST['enabled']
		       );

    }
    if( insertUser() ) {
        $saved = true;
    }

}

if ($op === 'edit_user' ) {

    function editUser() {

	    empty($_POST[password_field]) ? $password = "" : $password = "password = '".md5($_POST[password_field])."',"  ;

        $sql = "UPDATE ".TB_PREFIX."user
                    SET
                        email = :email,
                        $password
                        role_id = :role,
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
			website = :website,
			logo = :logo,
			notes = :notes,
                        enabled = :enabled
                    WHERE
                        id = :id
                ";

        return dbQuery($sql,
		       ':email',$_POST['email'],
		       ':role',$_POST['role'],
		       ':name',$_POST['name'],
		       ':street_address',$_POST['street_address'],
		       ':street_address2',$_POST['street_address2'],
		       ':city',$_POST['city'],
		       ':state',$_POST['state'],
		       ':zip_code',$_POST['zip_code'],
		       ':country',$_POST['country'],
		       ':phone',$_POST['phone'],
		       ':mobile_phone',$_POST['mobile_phone'],
		       ':fax',$_POST['fax'],
		       ':website',$_POST['website'],
		       ':logo',$_POST['logo'],
		       ':notes',$_POST['notes'],
		       ':enabled',$_POST['enabled'],
		       ':id',$_POST['id']
		       );

    }
    if( editUser() ) {
        $saved = true;
    }

}


$smarty -> assign('saved',$saved);

$smarty -> assign('pageActive', 'user');
$smarty -> assign('active_tab', '#people');
?>
