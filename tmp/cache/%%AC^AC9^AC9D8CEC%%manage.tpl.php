<?php /* Smarty version 2.6.18, created on 2013-12-11 03:12:23
         compiled from ../templates/default/currencys_tt/manage.tpl */ ?>
<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=currencys_tt&view=add" class="positive">
                <img src="./images/famfam/add.png" alt=""/>
                <?php echo $this->_tpl_vars['LANG']['currency_tt_add']; ?>

            </a>

        </td>
        <td>
            <a href="./index.php?module=currencys_tt&view=update" class="positive">
                <?php echo $this->_tpl_vars['LANG']['tt_rate_update']; ?>

            </a>

        </td>
    </tr>
</table>

<?php if ($this->_tpl_vars['number_of_rows']['count'] == 0): ?>

	<br />
	<br />
	<span class="welcome"><?php echo $this->_tpl_vars['LANG']['no_currency_tt']; ?>
</span>
	<br />
	<br />
	<br />
	<br />

<?php else: ?>
	<br />
	<table id="manageGrid" style="display:none"></table>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/currencys_tt/manage.js.php', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
<?php endif; ?>