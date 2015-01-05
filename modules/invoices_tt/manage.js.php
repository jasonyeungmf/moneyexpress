<script type="text/javascript">
{literal}
	var columns = 20;
	var padding = 0;
	var action_menu = 120;
	var grid_width = $('.col').width();
	//var url = 'index.php?module=invoices&view=xml';
			
	grid_width = grid_width - (columns * padding) - action_menu;
	percentage_width = grid_width / 100; 
			
	function test(com,grid)
	{
		if (com=='Delete')
			{
				confirm('Delete ' + $('.trSelected',grid).length + ' items?')
			}
		else if (com=='Add')
			{
				alert('Add New Item');
			}			
	}

	$("#manageGrid").flexigrid
	(
	{
	url: "{/literal}{$url}{literal}",
	dataType: 'xml',
	colModel : [
		{display: '{/literal}{$LANG.actions}{literal}', name : 'actions', width : action_menu, sortable : false, align: 'center'},
		{display: '{/literal}{$LANG.id}{literal}', name : 'id', width :5 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.date}{literal}', name : 'date', width : 11 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.index_id}{literal}', name : 'index_id', width :15 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.biller}{literal}', name : 'biller', width :5 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.customer_id}{literal}', name : 'customer_id', width :6 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.customer_detail}{literal}', name : 'customer_detail', width :20 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.customer_detail_2}{literal}', name : 'customer_detail_2', width :20 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.account_detail}{literal}', name : 'account_detail', width :20 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.trading_type}{literal}', name : 'trading_type', width :6 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.payment_type}{literal}', name : 'payment_type', width :10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.quantity}{literal}', name : 'quantity', width :10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.unit_price}{literal}', name : 'unit_price', width :10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.charge}{literal}', name : 'charge', width :5 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.total}{literal}', name : 'total', width :10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.currency}{literal}', name : 'currency', width :5 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.calculation_type}{literal}', name : 'calculation_type', width :8 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.payable_amount}{literal}', name : 'payable_amount', width :10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.spell_number}{literal}', name : 'spell_number', width :20 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.note}{literal}', name : 'note', width :10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.preference}{literal}', name : 'preference', width :5 * percentage_width, sortable : true, align: 'left'}
		],
	searchitems : [
		{display: '{/literal}{$LANG.index_id}{literal}', name : 'index_id', isdefault: true},
		{display: '{/literal}{$LANG.date}{literal}', name : 'date'},
		{display: '{/literal}{$LANG.customer_id}{literal}', name : 'customer_id'},
		{display: '{/literal}{$LANG.customer_detail}{literal}', name : 'customer_detail'},
		{display: '{/literal}{$LANG.customer_detail_2}{literal}', name : 'a.name'},
		{display: '{/literal}{$LANG.account_detail}{literal}', name : 'account_detail'},
		{display: '{/literal}{$LANG.biller}{literal}', name : 'b.name'},
		{display: '{/literal}{$LANG.payment_type}{literal}', name : 'pt.pt_description'},
		{display: '{/literal}{$LANG.trading_type}{literal}', name : 'tt.description'},
		{display: '{/literal}{$LANG.currency}{literal}', name : 'ctt.code'},
		{display: '{/literal}{$LANG.note}{literal}', name : 'note'},
		{display: '{/literal}{$LANG.preference}{literal}', name : 'pf.pref_description'}
		],
	sortname: "id",
	sortorder: "desc",/*asc or desc*/
	usepager: true,
	pagestat: '{/literal}{$LANG.displaying_items}{literal}',
	procmsg: '{/literal}{$LANG.processing}{literal}',
	nomsg: '{/literal}{$LANG.no_items}{literal}',
	pagemsg: '{/literal}{$LANG.page}{literal}',
	ofmsg: '{/literal}{$LANG.of}{literal}',
	useRp: true,
	rp: 100,
	rpOptions: [50,100,200,300,500],
	showToggleBtn: true,
	showTableToggleBtn: true,
	width: 'auto',
	height: 450,
	title: 'TT Invoices',
	nowrap: false,
	singleSelect: true
	}
	);
{/literal}

</script>
