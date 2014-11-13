<?php /* Smarty version 2.6.18, created on 2014-03-02 01:50:56
         compiled from ../templates/default/customers/save.tpl */ ?>
<?php if ($this->_tpl_vars['saved'] == true): ?>

<br />
	<?php echo $this->_tpl_vars['LANG']['save_customer_success']; ?>

<br />
<br />
<?php else: ?>
<br />
	 <?php echo $this->_tpl_vars['LANG']['save_customer_failure']; ?>

<br />
<br />
<?php endif; ?>

<?php if ($_POST['cancel'] == null): ?>
	<meta http-equiv="refresh" content="0;url=index.php?module=customers&amp;view=manage" />
<?php else: ?>
	<meta http-equiv="refresh" content="0;url=index.php?module=customers&amp;view=manage" />
<?php endif; ?>