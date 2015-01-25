<?php /* Smarty version 2.6.18, created on 2014-01-22 02:11:41
         compiled from ../templates/default/cron/manage.tpl */ ?>

<table class="buttons" align="center">
    <tr>
        <td>

            <a href="index.php?module=cron&amp;view=add" class="positive">
                <img src="./images/common/add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['new_recurrence']; ?>

            </a>

        </td>
    </tr>
</table>

<?php if ($this->_tpl_vars['number_of_crons']['count'] == 0): ?>
	
	<br />
	<br />
	<span class="welcome"><?php echo $this->_tpl_vars['LANG']['no_crons']; ?>
</span>
	<br />
	<br />
	<br />
	<br />
<?php else: ?>


	<br />
	<table id="manageGrid" style="display:none"></table>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/cron/manage.js.php', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>

