<?php /* Smarty version 2.6.18, created on 2014-03-03 23:22:04
         compiled from ../templates/default/accounts/save.tpl */ ?>
<?php if ($this->_tpl_vars['saved'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_account_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_account_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<?php if ($_POST['cancel'] == null): ?>
	<meta http-equiv="refresh" content="0;URL=index.php?module=accounts&amp;view=manage" />
<?php else: ?>
	<meta http-equiv="refresh" content="0;URL=index.php?module=accounts&amp;view=manage" />
<?php endif; ?>