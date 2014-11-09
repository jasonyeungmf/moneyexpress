<script type="text/javascript">

{literal}
var columns = 13;
var padding = 12;
var grid_width = $('.col').width();
			
grid_width = grid_width - (columns * padding);
percentage_width = grid_width / 100; 
			
	$('#manageGrid').flexigrid
	(
	{
	url: 'index.php?module=customers&view=xml',
	dataType: 'xml',
	colModel : [
		{display: '{/literal}{$LANG.actions}{literal}', name : 'actions', width : 5 * percentage_width, sortable : false, align: 'center'},
		{display: '{/literal}{$LANG.customer_no}{literal}', name : 'customer_no', width : 7 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.id_document}{literal}', name : 'id_document', width : 10 * percentage_width, sortable : false, align: 'left'},
		{display: '{/literal}{$LANG.name_attn}{literal}', name : 'name_attn', width : 15 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.id_no}{literal}', name : 'id_no', width : 10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.mobile_phone_fax}{literal}', name : 'mobile_phone_fax', width : 20 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.email}{literal}', name : 'email', width : 10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.address}{literal}', name : 'address', width : 20 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.notes}{literal}', name : 'notes', width : 10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.total}{literal}', name : 'customer_total', width : 10 * percentage_width, sortable : true, align: 'left'},
		{display: '{/literal}{$LANG.enabled}{literal}', name : 'enabled', width : 5 * percentage_width, sortable : true, align: 'left'}
				
		],

	searchitems : [
		{display: '{/literal}{$LANG.customer_no}{literal}', name : 'customer_no', isdefault: true},
		{display: '{/literal}{$LANG.name_attn}{literal}', name : 'name_attn'},
		{display: '{/literal}{$LANG.mobile_phone_fax}{literal}', name : 'mobile_phone_fax'},
		{display: '{/literal}{$LANG.id_no}{literal}', name : 'id_no'},
		{display: '{/literal}{$LANG.notes}{literal}', name : 'notes'},
		{display: '{/literal}{$LANG.address}{literal}', name : 'address'}
		],
	sortname: 'customer_no',
	sortorder: 'asc',/*asc or desc*/
	usepager: true,
	title: 'Customers',
	pagestat: '{/literal}{$LANG.displaying_items}{literal}',
	procmsg: '{/literal}{$LANG.processing}{literal}',
	nomsg: '{/literal}{$LANG.no_items}{literal}',
	pagemsg: '{/literal}{$LANG.page}{literal}',
	ofmsg: '{/literal}{$LANG.of}{literal}',
	useRp: true,
	rp: 50, // results per page
	rpOptions: [10,20,30,40,50,100],
	showToggleBtn: true,
	showTableToggleBtn: true,
	height:500,
    width: 'auto',
    nowrap: false,
    singleSelect: true
	}
	);
{/literal}

</script>
