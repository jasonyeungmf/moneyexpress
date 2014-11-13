<?php /* Smarty version 2.6.18, created on 2013-12-17 20:44:40
         compiled from ../templates/default/trading_types/save.tpl */ ?>

<br />
<?php if ($this->_tpl_vars['saved'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_trading_type_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_trading_type_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<?php if ($this->_tpl_vars['saved'] == true): ?>
	<meta http-equiv="refresh" content="2;URL=index.php?module=trading_types&amp;view=manage" />
<?php endif; ?>