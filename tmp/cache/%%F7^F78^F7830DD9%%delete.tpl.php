<?php /* Smarty version 2.6.18, created on 2013-12-16 01:07:19
         compiled from ../templates/default/accounts/delete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/accounts/delete.tpl', 37, false),array('modifier', 'urlencode', '../templates/default/accounts/delete.tpl', 47, false),)), $this); ?>

<?php if ($_GET['stage'] == 1): ?>

	<br />
			<font style="font-weight:bold" size="2"><?php echo $this->_tpl_vars['LANG']['confirm_delete']; ?>
</font>
			<br />
			<br />
		<table border="1" cellpadding="3" align="center">
			<tr>
				<td><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
				<td><?php echo $this->_tpl_vars['LANG']['name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['LANG']['serial_no']; ?>
</td>
				<td><?php echo $this->_tpl_vars['LANG']['payee']; ?>
</td>
				<td><?php echo $this->_tpl_vars['LANG']['bank']; ?>
</td>
				<td><?php echo $this->_tpl_vars['LANG']['account_no']; ?>
</td>
			</tr>
			
			<tr>
				<td><font size="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></td>
				<td><font size="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></td>
				<td><font style="font-weight:bold" size="2" color="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['serial_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></td>
				<td><font size="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['payee'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></td>
				<td><font size="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['bank'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></td>
				<td><font size="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['account_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></td>
			</tr>
 		</table>
            <br />
            <br />
        <form name="frmpost" action="index.php?module=accounts&amp;view=delete&amp;stage=2&amp;serial_no=<?php echo ((is_array($_tmp=$_GET['serial_no'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" method="post">
        <table class="buttons" align="center">
            <tr>
                <td>
                    <button type="submit" class="positive" name="submit">
                        <img class="button_img" src="./images/common/tick.png" alt="" /> 
                        <?php echo $this->_tpl_vars['LANG']['yes']; ?>

                    </button>

                    <input type="hidden" name="doDelete" value="y" />
                
                    <a href="./index.php?module=accounts&amp;view=manage" class="negative">
                        <img src="./images/common/cross.png" alt="" />
                        <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

                    </a>
            
                </td>
            </tr>
        </table>
        </form>	

	    </table>

<?php endif; ?>

<?php if ($_GET['stage'] == 2): ?>

	<div id="top"></b></div>
	<br /><br />
	<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['serial_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['deleted']; ?>

	<br /><br />

<?php endif; ?>