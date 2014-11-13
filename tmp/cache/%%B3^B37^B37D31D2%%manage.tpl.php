<?php /* Smarty version 2.6.18, created on 2013-12-17 20:44:20
         compiled from ../templates/default/trading_types/manage.tpl */ ?>

<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=trading_types&amp;view=add" class="positive">
                <img src="./images/famfam/add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_trading_type']; ?>

            </a>

        </td>
    </tr>
</table>

<?php if ($this->_tpl_vars['trading_types'] == null): ?>

	<br />
	<br />
	<span class="welcome"><?php echo $this->_tpl_vars['LANG']['no_trading_types']; ?>
</span>
	<br />
	<br />
	<br />
	<br />
	
<?php else: ?>

	<br />
	<table id="manageGrid" style="display:none"></table>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/trading_types/manage.js.php', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>