<?php /* Smarty version 2.6.18, created on 2013-12-11 02:40:59
         compiled from ../templates/default/payments/manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', '../templates/default/payments/manage.tpl', 37, false),)), $this); ?>

	<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=payments&amp;view=process&amp;op=pay_invoice" class="positive">
                <img src="./images/famfam/add.png" alt=""/>
                <?php echo $this->_tpl_vars['LANG']['process_payment']; ?>

            </a>

        </td>
    </tr>
	</table>

 
	<?php if ($_GET['id']): ?>

        <table class="buttons" align="center">
        <tr>
            </td>
            <td>
                <a href="./index.php?module=payments&amp;view=process&amp;id=<?php echo ((is_array($_tmp=$_GET['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;op=pay_selected_invoice" class="positive">
                    <img src="./images/famfam/money.png" alt=""/>
                    <?php echo $this->_tpl_vars['LANG']['payments_filtered_invoice']; ?>

                </a>

            </td>
        </tr>
        </table>
        <?php if ($this->_tpl_vars['payments'] == null): ?>
        	<br />
        	<br />
        	<span class="welcome"><?php echo $this->_tpl_vars['LANG']['no_payments_invoice']; ?>
</span>
        	<br />
        	<br />
        <?php else: ?>
            <br />
        	<table id="manageGrid" style="display:none"></table>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/payments/manage.js.php', 'smarty_include_vars' => array('get' => $_GET)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

	<?php elseif ($_GET['c_id']): ?>


        <?php if ($this->_tpl_vars['payments'] == null): ?>
        	<br />
        	<br />
        	<span class="welcome"><?php echo $this->_tpl_vars['LANG']['no_payments_customer']; ?>
</span>
        	<br />
        	<br />
        <?php else: ?>
        	<br />
    	    <table id="manageGrid" style="display:none"></table>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/payments/manage.js.php', 'smarty_include_vars' => array('get' => $_GET)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

	<?php else: ?>

        <?php if ($this->_tpl_vars['payments'] == null): ?>
        	<br />
        	<br />
        	<span class="welcome"><?php echo $this->_tpl_vars['LANG']['no_payments']; ?>
</span>
        	<br />
        	<br />
        <?php else: ?>
        	<br />
        	<table id="manageGrid" style="display:none"></table>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/payments/manage.js.php', 'smarty_include_vars' => array('get' => $_GET)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

	<?php endif; ?>

<br />
<div style="text-align:center;">
<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_wheres_the_edit_button" title="<?php echo $this->_tpl_vars['LANG']['wheres_the_edit_button']; ?>
"><img src="./images/common/help-small.png" alt="" /> Wheres the Edit button?</a>
</div>