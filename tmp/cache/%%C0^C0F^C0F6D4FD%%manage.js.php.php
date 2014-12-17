<?php /* Smarty version 2.6.18, created on 2014-12-10 22:12:32
         compiled from ../modules/invoices/manage.js.php */ ?>
<script type="text/javascript">
<?php echo '
	var columns = 10;
	var padding = 5;
	var action_menu = 100;
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
<?php echo $this->_tpl_vars['LANG']['index_id']; ?>
<?php echo '\', name : \'index_id\', width :15 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['date_upper']; ?>
<?php echo '\', name : \'date\', width : 12 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['biller']; ?>
<?php echo '\', name : \'biller\', width :5 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer']; ?>
<?php echo '\', name : \'customer\', width :15 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
<?php echo '\', name : \'trading_type\', width :10 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['currency_detail']; ?>
<?php echo '\', name : \'currency_detail\', width :15 * percentage_width, sortable : true, align: \'left\'},				
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['total']; ?>
<?php echo '\', name : \'invoice_total\', width : 10 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['profit']; ?>
<?php echo '\', name : \'profit\', width : 10 * percentage_width, sortable : true, align: \'left\'},
	],
	searchitems : [
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['index_id']; ?>
<?php echo '\', name : \'iv.index_id\', isdefault: true},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['date']; ?>
<?php echo '\', name : \'iv.date\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['biller']; ?>
<?php echo '\', name : \'b.name\'},
		{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer']; ?>
<?php echo '\', name : \'c.name\'}
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
	rp: 50,
	rpOptions: [10,20,30,40,50,100],
	showToggleBtn: true,
	showTableToggleBtn: true,
	width: \'auto\',
	height: 450,
	title: \'Note Invoices\',
	nowrap: false,
	singleSelect: true
	}
	);
'; ?>


</script>