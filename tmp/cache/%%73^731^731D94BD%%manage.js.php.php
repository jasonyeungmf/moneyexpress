<?php /* Smarty version 2.6.18, created on 2014-02-23 01:15:14
         compiled from ../modules/products/manage.js.php */ ?>
<script type="text/javascript">

<?php echo '

var view_tooltip ="'; ?>
<?php echo $this->_tpl_vars['LANG']['quick_view_tooltip']; ?>
 {1}<?php echo '";
var edit_tooltip = "'; ?>
<?php echo $this->_tpl_vars['LANG']['edit_view_tooltip']; ?>
 <?php echo $this->_tpl_vars['invoices']['preference']['pref_inv_wording']; ?>
 {1}<?php echo '";
var inventory = "'; ?>
<?php echo $this->_tpl_vars['defaults']['inventory']; ?>
<?php echo '";


			var columns = 6;
			var padding = 12;
			var grid_width = $(\'.col\').width();
			
			grid_width = grid_width - (columns * padding);
			percentage_width = grid_width / 100; 
	    
            if(inventory == \'1\')
            {
                col_model = [ 
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['actions']; ?>
<?php echo '\', name : \'actions\', width : 5 * percentage_width, sortable : false, align: \'center\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id']; ?>
<?php echo '\', name : \'id\', width : 10 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['name']; ?>
<?php echo '\', name : \'description\', width : 50 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
<?php echo '\', name : \'unit_price\', width : 10 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['quantity']; ?>
<?php echo '\', name : \'quantity\', width : 10 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['enabled']; ?>
<?php echo '\', name : \'enabled\', width : 5 * percentage_width, sortable : true, align: \'left\'}
				];
            } else {
                col_model = [ 
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['actions']; ?>
<?php echo '\', name : \'actions\', width : 5 * percentage_width, sortable : false, align: \'center\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id']; ?>
<?php echo '\', name : \'id\', width : 10 * percentage_width, sortable : true, align: \'left\'},
                {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['name']; ?>
<?php echo '\', name : \'description\', width : 50 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
<?php echo '\', name : \'unit_price\', width : 10 * percentage_width, sortable : true, align: \'left\'},
				    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['enabled']; ?>
<?php echo '\', name : \'enabled\', width : 5 * percentage_width, sortable : true, align: \'left\'}
				];
            }
			
			$(\'#manageGrid\').flexigrid
			(
			{
			url: \'index.php?module=products&view=xml\',
			dataType: \'xml\',
			colModel : col_model,
			searchitems : [
				{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['id']; ?>
<?php echo '\', name : \'id\'},
				{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['name']; ?>
<?php echo '\', name : \'description\', isdefault: true}
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
			height: \'auto\',
			title: \'Product\',
			nowrap: false,
         	singleSelect: true
			}
			);


'; ?>


</script>