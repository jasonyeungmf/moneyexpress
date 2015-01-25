<?php /* Smarty version 2.6.18, created on 2014-03-03 22:34:16
         compiled from ../modules/accounts/manage.js.php */ ?>
<script type="text/javascript">

<?php echo '
var columns = 9;
var padding = 5;
var grid_width = $(\'.col\').width();
	
grid_width = grid_width - (columns * padding);
percentage_width = grid_width / 100; 
		
			
$(\'#manageGrid\').flexigrid
(
{
url: \'index.php?module=accounts&view=xml\',
dataType: \'xml\',
colModel : [
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['actions']; ?>
<?php echo '\', name : \'actions\', width : 7 * percentage_width, sortable : false, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
<?php echo '\', name : \'customer_no\', width : 7 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_detail']; ?>
<?php echo '\', name : \'customer_detail\', width : 15 * percentage_width, sortable : true, align: \'left\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['name']; ?>
<?php echo '\', name : \'name\', width : 10 * percentage_width, sortable : true, align: \'left\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['serial_no']; ?>
<?php echo '\', name : \'serial_no\', width : 7 * percentage_width, sortable : true, align: \'left\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['payee']; ?>
<?php echo '\', name : \'payee\', width : 15 * percentage_width, sortable : true, align: \'left\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['bank']; ?>
<?php echo '\', name : \'bank\', width : 15 * percentage_width, sortable : true, align: \'left\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['account_no']; ?>
<?php echo '\', name : \'account_no\', width : 20 * percentage_width, sortable : true, align: \'left\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['enabled']; ?>
<?php echo '\', name : \'enabled\', width : 5 * percentage_width, sortable : true, align: \'left\'}
    ],
				
searchitems : [
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
<?php echo '\', name : \'a.customer_no\', isdefault: true},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['customer_detail']; ?>
<?php echo '\', name : \'customer_detail\'},
	{display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['name']; ?>
<?php echo '\', name : \'a.name\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['serial_no']; ?>
<?php echo '\', name : \'a.serial_no\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['payee']; ?>
<?php echo '\', name : \'a.payee\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['bank']; ?>
<?php echo '\', name : \'a.bank\'},
    {display: \''; ?>
<?php echo $this->_tpl_vars['LANG']['account_no']; ?>
<?php echo '\', name : \'a.account_no\'},
	],
                      
sortname: \'a.serial_no\',
sortorder: \'desc\',/*asc or desc*/
usepager: true,
title: \'Accounts\',
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
rp: 50, // results per page
rpOptions: [10,20,30,40,50,100],
showToggleBtn: true,
showTableToggleBtn: true,
height:500,
width: \'auto\',
nowrap: false,
singleSelect: true
}
);

'; ?>


</script>