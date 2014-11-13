<script type="text/javascript">

{literal}

var view_tooltip ="{/literal}{$LANG.quick_view_tooltip} {ldelim}1{rdelim}{literal}";
var edit_tooltip = "{/literal}{$LANG.edit_view_tooltip} {$invoices.preference.pref_inv_wording} {ldelim}1{rdelim}{literal}";

			var columns = 11;
			var padding = 5;
			var grid_width = $('.col').width();
			
			grid_width = grid_width - (columns * padding);
			percentage_width = grid_width / 100; 
		
            /*
            * If Inventory in SImple Invoices is enabled than show quantity etc..
            */
			col_model = [ 
				    {display: '{/literal}{$LANG.actions}{literal}', name : 'actions', width : 5 * percentage_width, sortable : false, align: 'center'},
				    {display: '{/literal}{$LANG.id}{literal}', name : 'id', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.country}{literal}', name : 'country', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.symbol}{literal}', name : 'symbol', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.currency_en}{literal}', name : 'currency_en', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.currency_local}{literal}', name : 'currency_local', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.code}{literal}', name : 'code', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.tt_sell}{literal}', name : 'tt_sell', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.tt_buy}{literal}', name : 'tt_buy', width : 5 * percentage_width, sortable : true, align: 'left'},				    
				    {display: '{/literal}{$LANG.enabled}{literal}', name : 'enabled', width : 5 * percentage_width, sortable : true, align: 'left'}
				];

			$('#manageGrid').flexigrid
			(
			{
			url: 'index.php?module=currencys_tt&view=xml',
			dataType: 'xml',
			colModel : col_model,
			searchitems : [
				{display: '{/literal}{$LANG.id}{literal}', name : 'id'}
				],
			sortname: 'id',
			sortorder: 'asc',
			usepager: true,
			pagestat: '{/literal}{$LANG.displaying_items}{literal}',
			procmsg: '{/literal}{$LANG.processing}{literal}',
			nomsg: '{/literal}{$LANG.no_items}{literal}',
			pagemsg: '{/literal}{$LANG.page}{literal}',
			ofmsg: '{/literal}{$LANG.of}{literal}',
			useRp: true,
			rp: 40,
			showToggleBtn: true,
			showTableToggleBtn: true,
			height: 500,
            title: 'Currency T/T',
            nowrap: false,
            singleSelect: true
			}
			);


{/literal}

</script>
