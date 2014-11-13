<?php /* Smarty version 2.6.18, created on 2013-12-11 03:12:23
         compiled from ../modules/currencys_tt/manage.js.php */ ?>
<script type="text/javascript">

<?php echo '

var view_tooltip ="'; ?>
<?php echo $this->_tpl_vars['LANG']['quick_view_tooltip']; ?>
 {1}<?php echo '";
var edit_tooltip = "'; ?>
<?php echo $this->_tpl_vars['LANG']['edit_view_tooltip']; ?>
 <?php echo $this->_tpl_vars['invoices']['preference']['pref_inv_wording']; ?>
 {1}<?php echo '";

			var columns = 11;
			var padding = 5;
			var grid_width = $(\'.col\').width();
			
			grid_width = grid_width - (columns * padding);
			percentage_width = grid_width / 100; 
		
            /*
            * If Inventory in SImple Invoices is enabled than show quantity etc..
            */
			col_model = [ 
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['actions']; ?>
<?php echo '\', name : \'actions\', width : 5 * percentage_width, sortable : false, align: \'center\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id']; ?>
<?php echo '\', name : \'id\', width : 5 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['country']; ?>
<?php echo '\', name : \'country\', width : 5 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['symbol']; ?>
<?php echo '\', name : \'symbol\', width : 5 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['currency_en']; ?>
<?php echo '\', name : \'currency_en\', width : 10 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['currency_local']; ?>
<?php echo '\', name : \'currency_local\', width : 10 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['code']; ?>
<?php echo '\', name : \'code\', width : 5 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['tt_sell']; ?>
<?php echo '\', name : \'tt_sell\', width : 5 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['tt_buy']; ?>
<?php echo '\', name : \'tt_buy\', width : 5 * percentage_width, sortable : true, align: \'left\'},				    
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['enabled']; ?>
<?php echo '\', name : \'enabled\', width : 5 * percentage_width, sortable : true, align: \'left\'}
				];

			$(\'#manageGrid\').flexigrid
			(
			{
			url: \'index.php?module=currencys_tt&view=xml\',
			dataType: \'xml\',
			colModel : col_model,
			searchitems : [
				{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id']; ?>
<?php echo '\', name : \'id\'}
				],
			sortname: \'id\',
			sortorder: \'asc\',
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
			rp: 40,
			showToggleBtn: true,
			showTableToggleBtn: true,
			height: 500,
            title: \'Currency T/T\',
            nowrap: false,
            singleSelect: true
			}
			);


'; ?>


</script>