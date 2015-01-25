<?php /* Smarty version 2.6.18, created on 2014-01-05 01:10:42
         compiled from ../templates/default/currencys_tt/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', '../templates/default/currencys_tt/details.tpl', 1, false),array('modifier', 'htmlsafe', '../templates/default/currencys_tt/details.tpl', 9, false),array('function', 'html_options', '../templates/default/currencys_tt/details.tpl', 138, false),)), $this); ?>
<form name="frmpost" action="index.php?module=currencys_tt&view=save&id=<?php echo ((is_array($_tmp=$_GET['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" method="post" id="frmpost" onsubmit="return checkForm(this);">


<?php if ($_GET['action'] == 'view'): ?>
<br />
	<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['country']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['country'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['symbol']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['symbol'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_en']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['currency_en'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_local']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['currency_local'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['code']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['tt_buy']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['tt_buy'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['tt_sell']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['tt_sell'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['wording_for_enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
</table>
	<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=currencys_tt&view=details&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
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
		<td><input type="text" name="country" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['country'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="country"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['symbol']; ?>
</td>
		<td><input type="text" name="symbol" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['symbol'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="symbol"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_en']; ?>
</td>
		<td><input type="text" name="currency_en" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['currency_en'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="currency_en"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency_local']; ?>
</td>
		<td><input type="text" name="currency_local" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['currency_local'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="currency_local"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['code']; ?>
</td>
		<td><input type="text" name="code" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="code"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['tt_buy']; ?>
</td>
		<td><input type="text" name="tt_buy" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['tt_buy'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="tt_buy"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['tt_sell']; ?>
</td>
		<td><input type="text" name="tt_sell" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['tt_sell'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="tt_sell"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field1" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field2" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field3" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['currency_tt_cf4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field4" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency_tt']['custom_field4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'enabled','options' => $this->_tpl_vars['enabled'],'selected' => $this->_tpl_vars['currency_tt']['enabled']), $this);?>

		</td>
	</tr>
	</table>
<?php endif; ?> 
<?php if ($_GET['action'] == 'edit'): ?>
	<br />
	<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="save_currency_tt" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
			    <img class="button_img" src="./images/common/tick.png" alt="" /> 
				<?php echo $this->_tpl_vars['LANG']['save']; ?>

			</button>

			<input type="hidden" name="op" value="edit_currency_tt">
		
			<a href="./index.php?module=currencys_tt&view=manage" class="negative">
		        <img src="./images/common/cross.png" alt="" />
	        	<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

    		</a>
	
		</td>
	</tr>
</table>
		
	<?php endif; ?>
</form>