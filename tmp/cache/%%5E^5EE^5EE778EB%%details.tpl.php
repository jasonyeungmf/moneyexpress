<?php /* Smarty version 2.6.18, created on 2014-03-03 23:22:54
         compiled from ../templates/default/accounts/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/accounts/details.tpl', 64, false),array('function', 'html_options', '../templates/default/accounts/details.tpl', 91, false),)), $this); ?>
<form name="frmpost" action="index.php?module=accounts&amp;view=save&amp;serial_no=<?php echo $_GET['serial_no']; ?>
" method="post" id="frmpost" onsubmit="return checkForm(this);">


<?php if ($_GET['action'] == 'view'): ?>

<br />
<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['customer_no']; ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['name']; ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['serial_no']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['serial_no']; ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['payee']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['payee']; ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['bank']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['bank']; ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['account_no']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['account_no']; ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['wording_for_enabled']; ?>
</td>
	</tr>
</table>
<?php endif; ?>


<?php if ($_GET['action'] == 'view'): ?>
<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=accounts&amp;view=details&amp;action=edit&amp;serial_no=<?php echo $this->_tpl_vars['account']['serial_no']; ?>
" class="positive">
					<img src="./images/famfam/report_edit.png" alt=""/>
					<?php echo $this->_tpl_vars['LANG']['edit']; ?>

				</a>

			</td>
		</tr>
	</table>
<?php endif; ?>


<?php if ($_GET['action'] == 'edit'): ?>
<br />
<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
		<td><input type="text" name="customer_no" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['name']; ?>
</td>
		<td><input type="text" name="name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="80" AUTOCOMPLETE="OFF" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['serial_no']; ?>
</td>
		<td><?php echo $this->_tpl_vars['account']['serial_no']; ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['payee']; ?>
</td>
		<td><input type="text" name="payee" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['payee'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['bank']; ?>
</td>
		<td>			
			<input type="text" name="bank" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['bank'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/>
		</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['account_no']; ?>
</td>
		<td><input type="text" name="account_no" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['account_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td>
		<?php echo smarty_function_html_options(array('name' => 'enabled','options' => $this->_tpl_vars['enabled'],'selected' => $this->_tpl_vars['account']['enabled']), $this);?>

		</td>
	</tr>

</table>
<?php endif; ?> 

<?php if ($_GET['action'] == 'edit'): ?>
<br />
	<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="save_account" value="<?php echo $this->_tpl_vars['LANG']['save_account']; ?>
">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                <?php echo $this->_tpl_vars['LANG']['save']; ?>

            </button>

            <input type="hidden" name="op" value="edit_account">
   			<input type="hidden" name="categorie" value="1" />

            <a href="./index.php?module=accounts&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

            </a>
    
        </td>
    </tr>
	</table>
	<?php endif; ?>
</form>