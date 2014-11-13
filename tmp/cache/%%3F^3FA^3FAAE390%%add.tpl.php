<?php /* Smarty version 2.6.18, created on 2013-12-17 00:02:58
         compiled from ../templates/default/currencys_note/add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/currencys_note/add.tpl', 19, false),array('modifier', 'unescape', '../templates/default/currencys_note/add.tpl', 83, false),array('function', 'html_options', '../templates/default/currencys_note/add.tpl', 88, false),)), $this); ?>


<?php if ($_POST['code'] != "" && $_POST['id'] != null): ?> 
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../templates/default/currencys_note/save.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
 
	<?php if ($_POST['id'] != null): ?> 
		<div class="validation_alert"><img src="./images/common/important.png" alt="" />
		You must enter a code for the currency note</div>
		<hr />
	<?php endif; ?>
<form name="frmpost" action="index.php?module=currencys_note&view=add" method="POST" id="frmpost" onsubmit="return checkForm(this);">
<br />

<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['country']; ?>
</td>
		<td><input type="text" class="edit" name="country" value="<?php echo ((is_array($_tmp=$_POST['country'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['symbol']; ?>
</td>
		<td><input type="text" class="edit" name="symbol" value="<?php echo ((is_array($_tmp=$_POST['symbol'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_en']; ?>
</td>
		<td><input type="text" class="edit" name="currency_en" value="<?php echo ((is_array($_tmp=$_POST['currency_en'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_local']; ?>
</td>
		<td><input type="text" class="edit" name="currency_local" value="<?php echo ((is_array($_tmp=$_POST['currency_local'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['code']; ?>
</td>
		<td><input type="text" class="edit" name="code" value="<?php echo ((is_array($_tmp=$_POST['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_buy']; ?>
</td>
		<td><input type="text" class="edit" name="note_buy" value="<?php echo ((is_array($_tmp=$_POST['note_buy'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_sell']; ?>
</td>
		<td><input type="text" class="edit" name="note_sell" value="<?php echo ((is_array($_tmp=$_POST['note_sell'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_amount']; ?>
</td>
		<td><input type="text" class="edit" name="note_amount" value="<?php echo ((is_array($_tmp=$_POST['note_amount'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_cost']; ?>
</td>
		<td><input type="text" class="edit" name="note_cost" value="<?php echo ((is_array($_tmp=$_POST['note_cost'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_total']; ?>
</td>
		<td><input type="text" class="edit" name="note_total" value="<?php echo ((is_array($_tmp=$_POST['note_total'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field1" value="<?php echo ((is_array($_tmp=$_POST['custom_field1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field2" value="<?php echo ((is_array($_tmp=$_POST['custom_field2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field3" value="<?php echo ((is_array($_tmp=$_POST['custom_field3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field4" value="<?php echo ((is_array($_tmp=$_POST['custom_field4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td>
		<td><textarea input type="text" class="editor" name='notes' rows="8" cols="50"><?php echo ((is_array($_tmp=$_POST['notes'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td>
			<?php echo smarty_function_html_options(array('class' => 'edit','name' => 'enabled','options' => $this->_tpl_vars['enabled'],'selected' => 1), $this);?>

		</td>
	</tr>
</table>
<br />
<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="id" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
			    <img class="button_img" src="./images/common/tick.png" alt="" /> 
				<?php echo $this->_tpl_vars['LANG']['save']; ?>

			</button>

			<input type="hidden" name="op" value="insert_currency_note" />
		
			<a href="./index.php?module=currencys_note&view=manage" class="negative">
		        <img src="./images/common/cross.png" alt="" />
	        	<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

    		</a>
	
		</td>
	</tr>
</table>


</form>
	<?php endif; ?>