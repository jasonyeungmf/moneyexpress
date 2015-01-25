<?php /* Smarty version 2.6.18, created on 2014-01-03 01:28:05
         compiled from ../templates/default/currencys_tt/update.tpl */ ?>

<?php if ($this->_tpl_vars['updated'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['update_currency_tt_rate_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['update_currency_tt_rate_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<meta http-equiv="refresh" content="1;URL=index.php?module=currencys_tt&view=manage" />
