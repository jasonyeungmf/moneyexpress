<?php /* Smarty version 2.6.18, created on 2013-12-18 22:40:13
         compiled from ../templates/default/tax_rates/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', '../templates/default/tax_rates/details.tpl', 1, false),array('modifier', 'htmlsafe', '../templates/default/tax_rates/details.tpl', 10, false),array('modifier', 'siLocal_number', '../templates/default/tax_rates/details.tpl', 24, false),array('function', 'html_options', '../templates/default/tax_rates/details.tpl', 72, false),)), $this); ?>
<form name="frmpost" action="index.php?module=tax_rates&amp;view=save&amp;id=<?php echo ((is_array($_tmp=$_GET['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"
 method="post" onsubmit="return frmpost_Validator(this)">


<?php if ($_GET['action'] === 'view'): ?>
<br />

	<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['description']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['rate']; ?>

		<a 
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_tax_rate_sign"
				title="<?php echo $this->_tpl_vars['LANG']['tax_rate']; ?>
"
		>
		<img src="./images/common/help-small.png" />
		</a>
	</td>
	<td>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_percentage'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['type'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

	</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	</table>
	<br />
	<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=tax_rates&amp;view=details&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;action=edit" class="positive">
                <img src="./images/famfam/report_edit.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['edit']; ?>

            </a>
    
        </td>
    </tr>
	</table>


<?php endif; ?>

<?php if ($_GET['action'] === 'edit'): ?>



	<br />

	<table align="center">
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['description']; ?>
</td>
		<td><input type="text" name="tax_description" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  class="validate[required]" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['rate']; ?>

		<a 
			class="cluetip"
			href="#"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_tax_rate_sign"
			title="<?php echo $this->_tpl_vars['LANG']['tax_rate']; ?>
"
		>
			<img src="./images/common/help-small.png" />
		</a>
		</td>
		<td>
			<input type="text" name="tax_percentage" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_percentage'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
" size="10" />
			<?php echo smarty_function_html_options(array('name' => 'type','options' => $this->_tpl_vars['types'],'selected' => $this->_tpl_vars['tax']['type']), $this);?>

		</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
 </td><td>
		
		<select name="tax_enabled">
<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" selected style="font-weight: bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
<option value="1"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</option>
<option value="0"><?php echo $this->_tpl_vars['LANG']['disabled']; ?>
</option>
</select>

</td>
	</tr>
	</table>
    <br />
	<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="save_tax_rate" value="<?php echo $this->_tpl_vars['LANG']['save_tax_rate']; ?>
">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                <?php echo $this->_tpl_vars['LANG']['save']; ?>

            </button>

			<input type="hidden" name="op" value="edit_tax_rate" />

            <a href="./index.php?module=tax_rates&view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

            </a>
    
        </td>
    </tr>
	</table>

<?php endif; ?>


</form>
