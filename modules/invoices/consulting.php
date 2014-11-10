<?php
checkLogin();


jsBegin();
jsFormValidationBegin("frmpost");
jsTextValidation("biller_id","Biller Name",1,1000000);
jsTextValidation("customer_id","Customer Name",1,1000000);
jsValidateifNumZero("i_quantity0","Quantity");
jsValidateifNum("i_quantity0","Quantity");
jsValidateRequired("select_products0","Product");
jsTextValidation("select_tax","Tax Rate",1,100);
jsPreferenceValidation("select_preferences","Invoice Preference",1,1000000);
jsFormValidationEnd();
jsEnd();

include('./modules/invoices/invoice.php');

$smarty -> assign('pageActive', 'invoice_new');
$smarty -> assign('active_tab', '#invoice');
?>