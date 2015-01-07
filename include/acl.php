<?php

$acl = new Zend_Acl();

//create the user roles
$acl->addRole(new Zend_Acl_Role('domain_administrator'));
$acl->addRole(new Zend_Acl_Role('administrator'));
$acl->addRole(new Zend_Acl_Role('user'));
$acl->addRole(new Zend_Acl_Role('viewer'));
$acl->addRole(new Zend_Acl_Role('customer'));
$acl->addRole(new Zend_Acl_Role('biller'));

//create the resources

$acl->add(new Zend_Acl_Resource('api'));
$acl->add(new Zend_Acl_Resource('auth'));
$acl->add(new Zend_Acl_Resource('export'));
$acl->add(new Zend_Acl_Resource('customers'));
$acl->add(new Zend_Acl_Resource('documentation'));
$acl->add(new Zend_Acl_Resource('extensions'));
$acl->add(new Zend_Acl_Resource('expense'));
$acl->add(new Zend_Acl_Resource('expense_account'));
$acl->add(new Zend_Acl_Resource('index'));
$acl->add(new Zend_Acl_Resource('install'));
$acl->add(new Zend_Acl_Resource('invoices'));
$acl->add(new Zend_Acl_Resource('billers'));
$acl->add(new Zend_Acl_Resource('reports'));
$acl->add(new Zend_Acl_Resource('options'));
$acl->add(new Zend_Acl_Resource('system_defaults'));
$acl->add(new Zend_Acl_Resource('custom_fields'));
$acl->add(new Zend_Acl_Resource('user'));
$acl->add(new Zend_Acl_Resource('preferences'));
$acl->add(new Zend_Acl_Resource('payment_types'));
$acl->add(new Zend_Acl_Resource('statement'));

$acl->add(new Zend_Acl_Resource('accounts'));//jeson yang
$acl->add(new Zend_Acl_Resource('currencys_note'));//jeson yang
$acl->add(new Zend_Acl_Resource('currencys_tt'));//jeson yang
$acl->add(new Zend_Acl_Resource('currencys_cny'));//jeson yang
$acl->add(new Zend_Acl_Resource('invoices_tt'));//jeson yang
$acl->add(new Zend_Acl_Resource('trading_types'));//jeson yang
$acl->add(new Zend_Acl_Resource('calculation_types'));//jeson yang

//assign roels to resoruces

/* alternatively, the above could be written:
$acl->allow('guest', null, 'view');
*/

// Staff inherits view privilege from guest, but also needs additional privileges
//$acl->allow('student', null, array('customers'));
//$acl->deny('student');

// everyone see auth page
$acl->allow(null,'auth');
$acl->allow(null,'api');
//TODO: not good !!! - no acl for invoiecs as can't get html2pdf to work with zend_auth :(
$acl->allow(null,'invoices');

//students only see student page
$acl->allow('customer', 'customers', 'view');

// Editor inherits view, edit, submit, and revise privileges from staff,
// but also needs additional privileges
$acl->allow('domain_administrator');

// Administrator inherits nothing, but is allowed all privileges
$acl->allow('administrator');

//user - can do everythign except anything in the Settings menu
$acl->allow('user');
$acl->deny('user','options');
$acl->deny('user','system_defaults');
$acl->deny('user','custom_fields');
$acl->deny('user','user');
$acl->deny('user','preferences');
$acl->deny('user','payment_types');
$acl->deny('user','trading_types');
$acl->deny('user','calculation_types');
//$acl->deny('user','currencys_note','action');


