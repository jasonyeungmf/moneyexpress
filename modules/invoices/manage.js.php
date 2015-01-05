<script type="text/javascript">
{literal}
	var columns = 10;
	var padding = 5;
	var action_menu = 100;
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
	{display: '{/literal}{$LANG.index_id}{literal}', name : 'index_id', width :15 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.date_upper}{literal}', name : 'date', width : 12 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.biller}{literal}', name : 'biller', width :5 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.customer}{literal}', name : 'customer', width :15 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.trading_type}{literal}', name : 'trading_type', width :10 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.currency_detail}{literal}', name : 'currency_detail', width :15 * percentage_width, sortable : true, align: 'left'},				
	{display: '{/literal}{$LANG.total}{literal}', name : 'invoice_total', width : 10 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.profit}{literal}', name : 'profit', width : 10 * percentage_width, sortable : true, align: 'left'},
	],
	searchitems : [
		{display: '{/literal}{$LANG.index_id}{literal}', name : 'iv.index_id', isdefault: true},
		{display: '{/literal}{$LANG.date}{literal}', name : 'iv.date'},
		{display: '{/literal}{$LANG.biller}{literal}', name : 'b.name'},
		{display: '{/literal}{$LANG.customer}{literal}', name : 'c.name'}
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
	title: 'Note Invoices',
	nowrap: false,
	singleSelect: true
	}
	);
{/literal}

</script>
