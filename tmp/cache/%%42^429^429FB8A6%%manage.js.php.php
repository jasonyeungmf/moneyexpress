<?php /* Smarty version 2.6.18, created on 2015-01-04 23:38:40
         compiled from ../modules/invoices_tt/manage.js.php */ ?>
<script type="text/javascript">
<?php echo '
	var columns = 20;
	var padding = 0;
	var action_menu = 120;
	var grid_width = $(\'.col\').width();
	//var url = \'index.php?module=invoices&view=xml\';
			
	grid_width = grid_width - (columns * padding) - action_menu;
	percentage_width = grid_width / 100; 
			
	function test(com,grid)
	{
		if (com==\'Delete\')
			{
				confirm(\'Delete \' + $(\'.trSelected\',grid).length + \' items?\')
			}
		else if (com==\'Add\')
			{
				alert(\'Add New Item\');
			}			
	}

	$("#manageGrid").flexigrid
	(
	{
	url: "'; ?>
<?php echo $this->_tpl_vars['url']; ?>
<?php echo '",
	dataType: \'xml\',
	colModel : [
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['actions']; ?>
<?php echo '\', name : \'actions\', width : action_menu, sortable : false, align: \'center\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id']; ?>
<?php echo '\', name : \'id\', width :5 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['date']; ?>
<?php echo '\', name : \'date\', width : 11 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['index_id']; ?>
<?php echo '\', name : \'index_id\', width :15 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['biller']; ?>
<?php echo '\', name : \'biller\', width :5 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_id']; ?>
<?php echo '\', name : \'customer_id\', width :6 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_detail']; ?>
<?php echo '\', name : \'customer_detail\', width :20 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_detail_2']; ?>
<?php echo '\', name : \'customer_detail_2\', width :20 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['account_detail']; ?>
<?php echo '\', name : \'account_detail\', width :20 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
<?php echo '\', name : \'trading_type\', width :6 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['payment_type']; ?>
<?php echo '\', name : \'payment_type\', width :10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['quantity']; ?>
<?php echo '\', name : \'quantity\', width :10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
<?php echo '\', name : \'unit_price\', width :10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['charge']; ?>
<?php echo '\', name : \'charge\', width :5 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['total']; ?>
<?php echo '\', name : \'total\', width :10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['currency']; ?>
<?php echo '\', name : \'currency\', width :5 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['calculation_type']; ?>
<?php echo '\', name : \'calculation_type\', width :8 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['payable_amount']; ?>
<?php echo '\', name : \'payable_amount\', width :10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['spell_number']; ?>
<?php echo '\', name : \'spell_number\', width :20 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['note']; ?>
<?php echo '\', name : \'note\', width :10 * percentage_width, sortable : true, align: \'left\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['preference']; ?>
<?php echo '\', name : \'preference\', width :5 * percentage_width, sortable : true, align: \'left\'}
		],
	searchitems : [
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['index_id']; ?>
<?php echo '\', name : \'index_id\', isdefault: true},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['date']; ?>
<?php echo '\', name : \'date\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_id']; ?>
<?php echo '\', name : \'customer_id\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_detail']; ?>
<?php echo '\', name : \'customer_detail\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_detail_2']; ?>
<?php echo '\', name : \'a.name\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['account_detail']; ?>
<?php echo '\', name : \'account_detail\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['biller']; ?>
<?php echo '\', name : \'b.name\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['payment_type']; ?>
<?php echo '\', name : \'pt.pt_description\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
<?php echo '\', name : \'tt.description\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['currency']; ?>
<?php echo '\', name : \'ctt.code\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['note']; ?>
<?php echo '\', name : \'note\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['preference']; ?>
<?php echo '\', name : \'pf.pref_description\'}
		],
	sortname: "id",
	sortorder: "desc",/*asc or desc*/
	usepager: true,
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
	rp: 100,
	rpOptions: [20,30,40,50,100,200],
	showToggleBtn: true,
	showTableToggleBtn: true,
	width: \'auto\',
	height: 450,
	title: \'TT Invoices\',
	nowrap: false,
	singleSelect: true
	}
	);
'; ?>


</script>