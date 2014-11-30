<script type="text/javascript">

{literal}
/*
var view_tooltip ="{/literal}{$LANG.quick_view_tooltip} {ldelim}1{rdelim}{literal}";
var edit_tooltip = "{/literal}{$LANG.edit_view_tooltip} {$invoices.preference.pref_inv_wording} {ldelim}1{rdelim}{literal}";

		'<!--0 Quick View --><a class="index_table" title="'+  +''+ view_tooltip +'"  href="index.php?module=products&view=details&id={1}&action=view"> <img src="images/common/view.png" height="16" border="-5px" padding="-4px" valign="bottom" /></a>',

		'<!--1 Edit View --><a class="index_table" title="'+  +''+ edit_tooltip +'"  href="index.php?module=products&view=details&id={1}&action=edit"><img src="images/common/edit.png" height="16" border="-5px" padding="-4px" valign="bottom" /><!-- print --></a>',
*/

			var columns = 4;
			var padding = 12;
			var grid_width = $('.col').width();
			
			grid_width = grid_width - (columns * padding);
			percentage_width = grid_width / 100; 
		
			
			$('#manageGrid').flexigrid
			(
			{
			url: 'index.php?module=custom_fields&view=xml',
			dataType: 'xml',
			colModel : [
				{display: '{/literal}{$LANG.actions}{literal}', name : 'actions', width : 10 * percentage_width, sortable : false, align: 'center'},
				{display: '{/literal}{$LANG.id}{literal}', name : 'cf_id', width : 10 * percentage_width, sortable : false, align: 'left'},
				{display: '{/literal}{$LANG.custom_field}{literal}', name : 'cf_custom_field', width : 40 * percentage_width, sortable : false, align: 'left'},
				{display: '{/literal}{$LANG.custom_label}{literal}', name : 'cf_custom_label', width : 40 * percentage_width, sortable : false, align: 'left'}
				
				],
				

			sortname: 'cf_id',
			sortorder: 'asc',
			usepager: true,
			title: 'Manage Custom Fields',
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
