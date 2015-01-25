<?php /* Smarty version 2.6.18, created on 2015-01-05 22:48:18
         compiled from ../templates/default/invoices_tt/save.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', '../templates/default/invoices_tt/save.tpl', 13, false),)), $this); ?>
<?php if ($this->_tpl_vars['saved'] == true): ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_invoice_tt_success']; ?>

	<br />
	<br />
<?php else: ?>
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_invoice_tt_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<!-- <meta http-equiv="refresh" content="1;URL=index.php?module=invoices_tt&amp;view=quick_view&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" /> -->
<meta http-equiv="refresh" content="1;URL=index.php?module=export&amp;view=invoice_tt&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;format=print" />