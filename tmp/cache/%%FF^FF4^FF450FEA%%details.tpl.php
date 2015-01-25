<?php /* Smarty version 2.6.18, created on 2014-11-02 18:31:40
         compiled from ../templates/default/currencys_note/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', '../templates/default/currencys_note/details.tpl', 1, false),array('modifier', 'htmlsafe', '../templates/default/currencys_note/details.tpl', 9, false),array('modifier', 'unescape', '../templates/default/currencys_note/details.tpl', 72, false),array('function', 'html_options', '../templates/default/currencys_note/details.tpl', 169, false),)), $this); ?>
<form name="frmpost" action="index.php?module=currencys_note&view=save&id=<?php echo ((is_array($_tmp=$_GET['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" method="post" id="frmpost" onsubmit="return checkForm(this);">


<?php if ($_GET['action'] == 'view'): ?>
<br />
	<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['country']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['country'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['symbol']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['symbol'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_en']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['currency_en'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_local']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['currency_local'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['code']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_buy']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_buy'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_sell']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_sell'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_amount']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_amount'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_cost']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_cost'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_total']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_total'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['notes'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['wording_for_enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
</table>
	<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=currencys_note&view=details&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
&action=edit" class="positive">
					<img src="./images/famfam/add.png" alt=""/>
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
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['country']; ?>
</td>
		<td><input type="text" name="country" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['country'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="country"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['symbol']; ?>
</td>
		<td><input type="text" name="symbol" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['symbol'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="symbol"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_en']; ?>
</td>
		<td><input type="text" name="currency_en" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['currency_en'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="currency_en"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_local']; ?>
</td>
		<td><input type="text" name="currency_local" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['currency_local'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="currency_local"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['code']; ?>
</td>
		<td><input type="text" name="code" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="code"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_buy']; ?>
</td>
		<td><input type="text" name="note_buy" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_buy'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="note_buy"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_sell']; ?>
</td>
		<td><input type="text" name="note_sell" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_sell'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="note_sell"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_amount']; ?>
</td>
		<td><input type="text" name="note_amount" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_amount'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="note_amount"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_cost']; ?>
</td>
		<td><input type="text" name="note_cost" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_cost'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="note_cost"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_total']; ?>
</td>
		<td><input type="text" name="note_total" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['note_total'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="note_total"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field1" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field2" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field3" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_note_cf4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field4" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['custom_field4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td>
		<td><textarea name="notes" class="editor" rows="8" cols="50"><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_note']['notes'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'enabled','options' => $this->_tpl_vars['enabled'],'selected' => $this->_tpl_vars['currency_note']['enabled']), $this);?>

		</td>
	</tr>
	</table>
<?php endif; ?> 
<?php if ($_GET['action'] == 'edit'): ?>
	<br />
	<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="save_currency_note" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
			    <img class="button_img" src="./images/common/tick.png" alt="" /> 
				<?php echo $this->_tpl_vars['LANG']['save']; ?>

			</button>

			<input type="hidden" name="op" value="edit_currency_note">
		
			<a href="./index.php?module=currencys_note&view=manage" class="negative">
		        <img src="./images/common/cross.png" alt="" />
	        	<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

    		</a>
	
		</td>
	</tr>
</table>
		
	<?php endif; ?>
</form>