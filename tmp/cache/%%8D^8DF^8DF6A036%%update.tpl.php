<?php /* Smarty version 2.6.18, created on 2013-12-16 00:53:54
         compiled from ../templates/default/currencys_note/update.tpl */ ?>

<?php if ($this->_tpl_vars['updated'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['update_currency_note_rate_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['update_currency_note_rate_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<meta http-equiv="refresh" content="1;URL=index.php?module=currencys_note&view=manage" />
