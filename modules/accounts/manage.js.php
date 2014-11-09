<script type="text/javascript">

{literal}
var columns = 9;
var padding = 5;
var grid_width = $('.col').width();
	
grid_width = grid_width - (columns * padding);
percentage_width = grid_width / 100; 
		
			
$('#manageGrid').flexigrid
(
{
url: 'index.php?module=accounts&view=xml',
dataType: 'xml',
colModel : [
	{display: '{/literal}{$LANG.actions}{literal}', name : 'actions', width : 7 * percentage_width, sortable : false, align: 'left'},
	{display: '{/literal}{$LANG.customer_no}{literal}', name : 'customer_no', width : 7 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.customer_detail}{literal}', name : 'customer_detail', width : 15 * percentage_width, sortable : true, align: 'left'},
    {display: '{/literal}{$LANG.name}{literal}', name : 'name', width : 10 * percentage_width, sortable : true, align: 'left'},
    {display: '{/literal}{$LANG.serial_no}{literal}', name : 'serial_no', width : 7 * percentage_width, sortable : true, align: 'left'},
	{display: '{/literal}{$LANG.payee}{literal}', name : 'payee', width : 15 * percentage_width, sortable : true, align: 'left'},
    {display: '{/literal}{$LANG.bank}{literal}', name : 'bank', width : 15 * percentage_width, sortable : true, align: 'left'},
    {display: '{/literal}{$LANG.account_no}{literal}', name : 'account_no', width : 20 * percentage_width, sortable : true, align: 'left'},
    {display: '{/literal}{$LANG.enabled}{literal}', name : 'enabled', width : 5 * percentage_width, sortable : true, align: 'left'}
    ],
				
searchitems : [
	{display: '{/literal}{$LANG.customer_no}{literal}', name : 'a.customer_no', isdefault: true},
	{display: '{/literal}{$LANG.customer_detail}{literal}', name : 'customer_detail'},
	{display: '{/literal}{$LANG.name}{literal}', name : 'a.name'},
    {display: '{/literal}{$LANG.serial_no}{literal}', name : 'a.serial_no'},
    {display: '{/literal}{$LANG.payee}{literal}', name : 'a.payee'},
    {display: '{/literal}{$LANG.bank}{literal}', name : 'a.bank'},
    {display: '{/literal}{$LANG.account_no}{literal}', name : 'a.account_no'},
	],
                      
sortname: 'a.serial_no',
sortorder: 'desc',/*asc or desc*/
usepager: true,
title: 'Accounts',
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
