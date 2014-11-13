<?php /* Smarty version 2.6.18, created on 2014-03-01 02:28:06
         compiled from ../templates/default/customers/import_from_excel.tpl */ ?>
<?php if ($this->_tpl_vars['import'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['update_customers_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['update_customers_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<meta http-equiv="refresh" content="1;URL=index.php?module=customers&view=manage" />
