<?php /* Smarty version 2.6.18, created on 2013-12-20 02:07:21
         compiled from ../templates/default/billers/save.tpl */ ?>

<?php if ($this->_tpl_vars['saved'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_biller_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_biller_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<?php if ($_POST['cancel'] == null): ?>
	<meta http-equiv="refresh" content="2;URL=index.php?module=billers&amp;view=manage" />
<?php else: ?>
	<meta http-equiv="refresh" content="0;URL=index.php?module=billers&amp;view=manage" />
<?php endif; ?>