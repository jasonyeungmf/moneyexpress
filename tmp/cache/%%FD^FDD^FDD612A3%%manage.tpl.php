<?php /* Smarty version 2.6.18, created on 2015-01-08 01:19:32
         compiled from ../templates/default/extensions/manage.tpl */ ?>
<br />
    <span class="welcome">
        Note: Manage extensions is still a work-in-progress
    </span>
<br />
<br />
<?php if ($this->_tpl_vars['exts'] == null): ?>
<p><em>No extensions registered</em></p>
<?php else: ?>
<table id="manageGrid" style="display:none"></table>

 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/extensions/manage.js.php', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 
<?php endif; ?>