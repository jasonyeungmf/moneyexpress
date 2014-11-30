<script type="text/javascript">

{literal}

var view_tooltip ="{/literal}{$LANG.quick_view_tooltip} {ldelim}1{rdelim}{literal}";
var edit_tooltip = "{/literal}{$LANG.edit_view_tooltip} {$invoices.preference.pref_inv_wording} {ldelim}1{rdelim}{literal}";

			var columns = 13;
			var padding = 5;
			var grid_width = $('.col').width();
			
			grid_width = grid_width - (columns * padding);
			percentage_width = grid_width / 100; 
		
            /*
            * If Inventory in SImple Invoices is enabled than show quantity etc..
            */
			col_model = [ 
				    {display: '{/literal}{$LANG.actions}{literal}', name : 'actions', width : 5 * percentage_width, sortable : false, align: 'center'},
				    {display: '{/literal}{$LANG.country}{literal}', name : 'country', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.symbol}{literal}', name : 'symbol', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.currency_en}{literal}', name : 'currency_en', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.currency_local}{literal}', name : 'currency_cn', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.code}{literal}', name : 'code', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.note_buy}{literal}', name : 'note_buy', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.note_sell}{literal}', name : 'note_sell', width : 5 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.note_amount}{literal}', name : 'note_amount', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.note_cost}{literal}', name : 'note_cost', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.note_total}{literal}', name : 'note_total', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.notes}{literal}', name : 'notes', width : 10 * percentage_width, sortable : true, align: 'left'},
				    {display: '{/literal}{$LANG.enabled}{literal}', name : 'enabled', width : 5 * percentage_width, sortable : true, align: 'left'}
				];

			$('#manageGrid').flexigrid
			(
			{
			url: 'index.php?module=currencys_note&view=xml',
			dataType: 'xml',
			colModel : col_model,
			searchitems : [
				{display: '{/literal}{$LANG.code}{literal}', name : 'code'}
				],
			sortname: 'code',
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
            title: 'Currency Note',
            nowrap: false,
            singleSelect: true
			}
			);


{/literal}

</script>
