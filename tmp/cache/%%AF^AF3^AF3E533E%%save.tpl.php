<?php /* Smarty version 2.6.18, created on 2014-01-05 02:05:57
         compiled from ../templates/default/currencys_cny/save.tpl */ ?>

<?php if ($this->_tpl_vars['saved'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_currency_cny_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_currency_cny_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<?php if ($_POST['cancel'] == null): ?>
	<meta http-equiv="refresh" content="2;URL=index.php?module=currencys_cny&view=manage" />
<?php else: ?>
	<meta http-equiv="refresh" content="1;URL=index.php?module=currencys_cny&view=manage" />
<?php endif; ?>