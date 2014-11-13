<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the currency(Note) id
$currency_note_id = $_GET['id'];

$currency_note = getCurrencyNote($currency_note_id);

#get custom field labels
$customFieldLabel = getCustomFieldLabels();


$smarty -> assign("defaults",getSystemDefaults());
$smarty -> assign('currency_note',$currency_note);

$smarty -> assign('customFieldLabel',$customFieldLabel);

$smarty -> assign('pageActive', 'currencys_note');
$subPageActive = $_GET['action'] =="view"  ? "currency_note_view" : "currency_note_edit" ;
$smarty -> assign('subPageActive', $subPageActive);
$smarty -> assign('active_tab', '#product');
?>
