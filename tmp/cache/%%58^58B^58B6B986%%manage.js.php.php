<?php /* Smarty version 2.6.18, created on 2014-03-01 03:45:44
         compiled from ../modules/customers/manage.js.php */ ?>
<script type="text/javascript">

<?php echo '
var columns = 13;
var padding = 12;
var grid_width = $(\'.col\').width();
			
grid_width = grid_width - (columns * padding);
percentage_width = grid_width / 100; 
			
	$(\'#manageGrid\').flexigrid
	(
	{
	url: \'index.php?module=customers&view=xml\',
	dataType: \'xml\',
	colModel : [
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['actions']; ?>
<?php echo '\', name : \'actions\', width : 5 * percentage_width, sortable : false, align: \'center\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
<?php echo '\', name : \'customer_no\', width : 7 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id_document']; ?>
<?php echo '\', name : \'id_document\', width : 10 * percentage_width, sortable : false, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['name_attn']; ?>
<?php echo '\', name : \'name_attn\', width : 15 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id_no']; ?>
<?php echo '\', name : \'id_no\', width : 10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['mobile_phone_fax']; ?>
<?php echo '\', name : \'mobile_phone_fax\', width : 20 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['email']; ?>
<?php echo '\', name : \'email\', width : 10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['address']; ?>
<?php echo '\', name : \'address\', width : 20 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['notes']; ?>
<?php echo '\', name : \'notes\', width : 10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['total']; ?>
<?php echo '\', name : \'customer_total\', width : 10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['enabled']; ?>
<?php echo '\', name : \'enabled\', width : 5 * percentage_width, sortable : true, align: \'left\'}
				
		],

	searchitems : [
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
<?php echo '\', name : \'customer_no\', isdefault: true},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['name_attn']; ?>
<?php echo '\', name : \'name_attn\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['mobile_phone_fax']; ?>
<?php echo '\', name : \'mobile_phone_fax\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id_no']; ?>
<?php echo '\', name : \'id_no\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['notes']; ?>
<?php echo '\', name : \'notes\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['address']; ?>
<?php echo '\', name : \'address\'}
		],
	sortname: \'customer_no\',
	sortorder: \'asc\',/*asc or desc*/
	usepager: true,
	title: \'Customers\',
	pagestat: \''; ?>
<?php echo $this->_tpl_vars['LANG']['displaying_items']; ?>
<?php echo '\',
	procmsg: \''; ?>
<?php echo $this->_tpl_vars['LANG']['processing']; ?>
<?php echo '\',
	nomsg: \''; ?>
<?php echo $this->_tpl_vars['LANG']['no_items']; ?>
<?php echo '\',
	pagemsg: \''; ?>
<?php echo $this->_tpl_vars['LANG']['page']; ?>
<?php echo '\',
	ofmsg: \''; ?>
<?php echo $this->_tpl_vars['LANG']['of']; ?>
<?php echo '\',
	useRp: true,
	rp: 50, // results per page
	rpOptions: [10,20,30,40,50,100],
	showToggleBtn: true,
	showTableToggleBtn: true,
	height:500,
    width: \'auto\',
    nowrap: false,
    singleSelect: true
	}
	);
'; ?>


</script>