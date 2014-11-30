<?php

$invoiceID = $_GET['id'];
$get_format = $_GET['format'];
$get_file_type = $_GET['filetype'];

#get the invoice id
$export = new exporttt();
$export -> format = $get_format;
$export -> file_type = $get_file_type;
$export -> file_location = 'download';
$export -> module = 'invoice';
$export -> id = $invoiceID;
$export -> execute();


?>
